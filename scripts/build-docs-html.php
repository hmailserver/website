<?php

declare(strict_types=1);

// Converts one version's docs-content/<version>/**/*.md tree into HTML fragments
// plus a manifest (slug -> title/parent/order/html_file), for html/documentation/page.php.
// Fragments are page body only; page chrome is added when the site is built.
// Usage: php scripts/build-docs-html.php [version] [content-dir] [output-dir]

final class DocIntegrityError extends RuntimeException
{
}

// -----------------------------------------------------------------------
// Front matter + Markdown body parsing
// -----------------------------------------------------------------------

/** @return array{0: array<string, string|int|bool|null>, 1: string} [front matter, body] */
function parseMarkdownFile(string $path): array
{
    $content = file_get_contents($path);
    if ($content === false) {
        throw new RuntimeException("Cannot read $path");
    }
    $content = str_replace("\r\n", "\n", $content);

    if (!str_starts_with($content, "---\n")) {
        throw new RuntimeException("$path: missing front matter");
    }
    $end = strpos($content, "\n---\n", 4);
    if ($end === false) {
        throw new RuntimeException("$path: unterminated front matter");
    }

    $meta = [];
    foreach (explode("\n", substr($content, 4, $end - 4)) as $line) {
        if (trim($line) === '') {
            continue;
        }
        [$key, $value] = array_map('trim', explode(':', $line, 2));
        $meta[$key] = parseFrontMatterValue($value);
    }

    $body = ltrim(substr($content, $end + 5), "\n");
    return [$meta, $body];
}

function parseFrontMatterValue(string $value): string|int|bool|null
{
    if ($value === 'null') {
        return null;
    }
    if ($value === 'true' || $value === 'false') {
        return $value === 'true';
    }
    if (preg_match('/^-?\d+$/', $value)) {
        return (int)$value;
    }
    if (strlen($value) >= 2 && $value[0] === '"' && $value[-1] === '"') {
        return str_replace('\\"', '"', substr($value, 1, -1));
    }
    return $value;
}

// -----------------------------------------------------------------------
// Markdown body -> HTML (mirrors, in reverse, the constrained subset that
// scripts/convert-docs-to-markdown.php produces; raw HTML passthrough
// blocks from that script are detected and emitted unchanged here).
// -----------------------------------------------------------------------

// Blank lines separate blocks, except inside a ``` fence — a naive
// preg_split('/\n{2,}/', ...) would otherwise split a code sample apart at
// its own internal blank lines.
/** @return array<int, string> */
function splitIntoBlocks(string $body): array
{
    $lines = explode("\n", trim($body));
    $blocks = [];
    $current = [];
    $inFence = false;

    foreach ($lines as $line) {
        if (str_starts_with(trim($line), '```')) {
            $inFence = !$inFence;
            $current[] = $line;
            continue;
        }
        if (!$inFence && trim($line) === '') {
            if ($current !== []) {
                $blocks[] = implode("\n", $current);
                $current = [];
            }
            continue;
        }
        $current[] = $line;
    }
    if ($current !== []) {
        $blocks[] = implode("\n", $current);
    }

    return $blocks;
}

function convertMarkdownBodyToHtml(string $body): string
{
    $blocks = splitIntoBlocks($body);
    $html = [];

    foreach ($blocks as $block) {
        $block = rtrim($block);
        if ($block === '') {
            continue;
        }

        if (preg_match('/^<[a-zA-Z]/', $block)) {
            $html[] = $block; // already-valid raw HTML passthrough
            continue;
        }
        if (str_starts_with($block, '```')) {
            $inner = preg_replace('/^```\n?/', '', $block);
            $inner = preg_replace('/\n?```$/', '', (string)$inner);
            $html[] = '<pre><code>' . htmlspecialchars((string)$inner, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</code></pre>';
            continue;
        }
        if (preg_match('/^(#{1,6})\s+(.*)$/', $block, $m)) {
            $level = strlen($m[1]);
            $html[] = "<h$level>" . convertInlineMarkdown($m[2]) . "</h$level>";
            continue;
        }
        if ($block === '---') {
            $html[] = '<hr>';
            continue;
        }
        if (str_starts_with($block, '>')) {
            $inner = implode("\n", array_map(
                static fn(string $l): string => preg_replace('/^>\s?/', '', $l) ?? $l,
                explode("\n", $block)
            ));
            $html[] = '<blockquote><p>' . convertInlineMarkdown($inner) . '</p></blockquote>';
            continue;
        }
        if (preg_match('/^(?:-\s|\d+\.\s)/', $block)) {
            [$listHtml] = parseListLines(explode("\n", $block), 0, 0);
            $html[] = $listHtml;
            continue;
        }

        $html[] = '<p>' . convertInlineMarkdown($block) . '</p>';
    }

    return implode("\n\n", $html) . "\n";
}

/** @param array<int, string> $lines @return array{0: string, 1: int} */
function parseListLines(array $lines, int $pos, int $indent): array
{
    $count = count($lines);
    $ordered = false;
    $items = '';

    while ($pos < $count) {
        $line = $lines[$pos];
        if (trim($line) === '') {
            $pos++;
            continue;
        }
        $lineIndent = strlen($line) - strlen(ltrim($line, ' '));
        if ($lineIndent < $indent) {
            break;
        }
        if ($lineIndent > $indent) {
            $posBefore = $pos;
            [$nestedHtml, $pos] = parseListLines($lines, $pos, $lineIndent);
            if ($pos === $posBefore) {
                // Over-indented line that isn't itself a list item (e.g. a
                // wrapped continuation line) - fold it into the previous
                // item's text instead of recursing forever with no progress.
                $extra = ' ' . convertInlineMarkdown(trim($line));
                $items = preg_replace('/<\/li>$/', $extra . '</li>', $items, 1) ?? $items;
                $pos++;
                continue;
            }
            $items .= $nestedHtml;
            continue;
        }

        $trimmedLine = ltrim($line, ' ');
        if (preg_match('/^-\s(.*)$/', $trimmedLine, $m)) {
            $itemText = $m[1];
        } elseif (preg_match('/^(\d+)\.\s(.*)$/', $trimmedLine, $m)) {
            $ordered = true;
            $itemText = $m[2];
        } else {
            break;
        }

        $pos++;
        $nested = '';
        if ($pos < $count && trim($lines[$pos]) !== '') {
            $nextIndent = strlen($lines[$pos]) - strlen(ltrim($lines[$pos], ' '));
            if ($nextIndent > $indent) {
                [$nested, $pos] = parseListLines($lines, $pos, $nextIndent);
            }
        }
        $items .= '<li>' . convertInlineMarkdown($itemText) . $nested . '</li>';
    }

    $tag = $ordered ? 'ol' : 'ul';
    return ["<$tag>" . $items . "</$tag>", $pos];
}

function convertInlineMarkdown(string $text): string
{
    $out = htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

    $out = preg_replace_callback('/`([^`]+)`/', static fn(array $m): string => '<code>' . $m[1] . '</code>', $out);
    $out = preg_replace_callback('/!\[([^\]]*)\]\(([^)]*)\)/', static fn(array $m): string => '<img src="' . $m[2] . '" alt="' . $m[1] . '">', (string)$out);
    $out = preg_replace_callback('/\[([^\]]*)\]\(([^)]*)\)/', static fn(array $m): string => '<a href="' . $m[2] . '">' . $m[1] . '</a>', (string)$out);
    $out = preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', (string)$out);
    $out = preg_replace('/\*(.+?)\*/s', '<em>$1</em>', (string)$out);
    $out = preg_replace('/ {2}\n/', "<br>\n", (string)$out);

    return (string)$out;
}

// -----------------------------------------------------------------------
// Tree / manifest
// -----------------------------------------------------------------------

/** @return array<string, array<string, mixed>> slug => doc record */
function loadVersionDocs(string $versionDir): array
{
    $docs = [];
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($versionDir, FilesystemIterator::SKIP_DOTS));
    foreach ($iterator as $file) {
        if (!$file->isFile() || $file->getExtension() !== 'md') {
            continue;
        }
        [$meta, $body] = parseMarkdownFile($file->getPathname());
        $slug = (string)($meta['slug'] ?? throw new DocIntegrityError("{$file->getPathname()}: missing 'slug' in front matter"));
        if (isset($docs[$slug])) {
            throw new DocIntegrityError("Duplicate slug '$slug' found in $versionDir (also at {$docs[$slug]['sourcePath']})");
        }
        $docs[$slug] = [
            'title' => (string)($meta['title'] ?? $slug),
            'slug' => $slug,
            'parentSlug' => $meta['parent'] ?? null,
            'index' => (int)($meta['index'] ?? 0),
            'isBook' => (bool)($meta['is_book'] ?? false),
            'html' => convertMarkdownBodyToHtml($body),
            'sourcePath' => $file->getPathname(),
        ];
    }
    return $docs;
}

/** @param array<string, array<string, mixed>> $docs */
function checkTreeIntegrity(array $docs): void
{
    $errors = [];
    foreach ($docs as $slug => $doc) {
        $parentSlug = $doc['parentSlug'];
        if ($parentSlug !== null && !isset($docs[$parentSlug])) {
            $errors[] = "'$slug' references missing parent slug '$parentSlug'";
        }
    }
    foreach ($docs as $slug => $doc) {
        $seen = [$slug => true];
        $cur = $doc;
        while ($cur['parentSlug'] !== null) {
            $p = $cur['parentSlug'];
            if (!isset($docs[$p])) {
                break; // already reported above
            }
            if (isset($seen[$p])) {
                $errors[] = "Cycle detected in parent chain starting at '$slug'";
                break;
            }
            $seen[$p] = true;
            $cur = $docs[$p];
        }
    }
    if ($errors !== []) {
        throw new DocIntegrityError("Tree integrity errors:\n - " . implode("\n - ", $errors));
    }
}

// -----------------------------------------------------------------------
// Overview / table-of-contents page (mirrors html/documentation/doc_overview.php,
// but computed once at build time instead of per-request)
// -----------------------------------------------------------------------

/** @param array<string, array<string, mixed>> $docs */
function buildOverviewHtml(array $docs, ?string $parentSlug, int $depth): string
{
    $children = array_filter($docs, static fn(array $d): bool => $d['parentSlug'] === $parentSlug);
    uasort($children, static function (array $a, array $b): int {
        return $a['index'] <=> $b['index'] ?: strcasecmp($a['title'], $b['title']);
    });

    $html = '<ul>';
    foreach ($children as $slug => $doc) {
        $title = htmlspecialchars($doc['title'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        $html .= '<li>';

        if (!$doc['isBook']) {
            $html .= "<a href=\"?page=$slug\">$title</a><br>";
        } else {
            $size = $depth + 1;
            $html .= "<h$size>$title</h$size>";
        }

        $showSubs = !in_array($slug, ['howtos', 'troubleshooting', 'FAQ'], true);
        if ($depth < 2 && $showSubs) {
            $html .= buildOverviewHtml($docs, $slug, $depth + 1);
        }

        $html .= '</li>';
    }
    $html .= '</ul>';

    return $html;
}

// -----------------------------------------------------------------------
// Main
// -----------------------------------------------------------------------

function main(array $argv): int
{
    $version = $argv[1] ?? 'latest';
    $contentDir = rtrim($argv[2] ?? __DIR__ . '/../docs-content', '/');
    $outputDir = rtrim($argv[3] ?? __DIR__ . '/../docs-build', '/');

    $versionDir = "$contentDir/$version";
    if (!is_dir($versionDir)) {
        fwrite(STDERR, "Version directory not found: $versionDir\n");
        return 1;
    }

    try {
        $docs = loadVersionDocs($versionDir);
        checkTreeIntegrity($docs);
    } catch (DocIntegrityError $e) {
        fwrite(STDERR, $e->getMessage() . "\n");
        return 1;
    }

    $versionOutDir = "$outputDir/$version";
    if (!is_dir($versionOutDir) && !mkdir($versionOutDir, 0777, true) && !is_dir($versionOutDir)) {
        throw new RuntimeException("Failed to create output directory: $versionOutDir");
    }

    $manifest = [];
    foreach ($docs as $slug => $doc) {
        $htmlFile = "$slug.html";
        file_put_contents("$versionOutDir/$htmlFile", $doc['html']);
        $manifest[$slug] = [
            'title' => $doc['title'],
            'parent' => $doc['parentSlug'],
            'index' => $doc['index'],
            'is_book' => $doc['isBook'],
            // Books are usually just section headings; page.php uses this to
            // decide whether a tree node links anywhere.
            'has_content' => trim($doc['html']) !== '',
            'html_file' => $htmlFile,
        ];
    }

    $manifestJson = json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    file_put_contents("$versionOutDir/manifest.json", $manifestJson . "\n");

    file_put_contents("$versionOutDir/overview.html", buildOverviewHtml($docs, null, 0));

    $books = count(array_filter($docs, static fn(array $d): bool => $d['isBook']));
    printf("Built %s: %d docs (%d books) -> %s\n", $version, count($docs), $books, $versionOutDir);
    return 0;
}

if (PHP_SAPI === 'cli' && isset($argv) && realpath($argv[0]) === __FILE__) {
    exit(main($argv));
}
