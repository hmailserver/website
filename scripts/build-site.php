<?php

declare(strict_types=1);

// Renders the site in html/ to static files for GitHub Pages. PHP only runs here, at build time.
// Usage: [GITHUB_TOKEN=...] php scripts/build-site.php [output-dir]

require __DIR__ . '/lib/github.php';
require __DIR__ . '/lib/doc-safety.php';
require __DIR__ . '/../html/lib/data.php';
require __DIR__ . '/../html/lib/docs.php';

const SOURCE_DIR = __DIR__ . '/../html';
const SITE_URL = 'https://www.hmailserver.com';

// Any PHP warning or notice fails the build.
set_error_handler(function (int $severity, string $message, string $file, int $line): bool {
    throw new ErrorException($message, 0, $severity, $file, $line);
});

$outputDir = $argv[1] ?? __DIR__ . '/../dist';
define('OUTPUT_DIR', $outputDir);

// Renders a template from html/ with $vars as its variables, and writes it for the URL $path
// (e.g. "/download/" -> download/index.html). Pages also get $canonical_url; "/404.html" has none.
function renderPage(string $template, string $path, array $vars = []): void
{
    $isPage = str_ends_with($path, '/');
    $vars['canonical_url'] = $isPage ? SITE_URL . $path : null;
    $outputFile = OUTPUT_DIR . ($isPage ? "{$path}index.html" : $path);

    $render = static function (string $_template, array $_vars): string {
        extract($_vars);
        ob_start();
        try {
            include SOURCE_DIR . "/$_template";
        } catch (Throwable $e) {
            ob_end_clean();
            throw new RuntimeException("Rendering $_template " . json_encode($_vars) . " failed: " . $e->getMessage(), 0, $e);
        }
        return ob_get_clean();
    };

    writeFile($outputFile, $render($template, $vars));
}

function writeFile(string $path, string $content): void
{
    $dir = dirname($path);
    if (!is_dir($dir) && !mkdir($dir, 0755, true)) {
        throw new RuntimeException("Cannot create $dir");
    }
    if (file_put_contents($path, $content) === false) {
        throw new RuntimeException("Cannot write $path");
    }
}

// Copies a file or directory. PHP files are skipped, since only rendered output is published.
function copyTree(string $source, string $target): void
{
    if (is_file($source)) {
        writeFile($target, file_get_contents($source));
        return;
    }
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source, FilesystemIterator::SKIP_DOTS)) as $file) {
        if ($file->getExtension() !== 'php') {
            writeFile($target . substr($file->getPathname(), strlen($source)), file_get_contents($file->getPathname()));
        }
    }
}

function removeTree(string $dir): void
{
    if (!is_dir($dir)) {
        return;
    }
    $items = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($items as $item) {
        $item->isDir() ? rmdir($item->getPathname()) : unlink($item->getPathname());
    }
    rmdir($dir);
}

function jsonEncode(array $data): string
{
    return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR) . "\n";
}

// Values used as URL path segments may only contain safe characters.
function assertPathSegment(string $value): string
{
    if (!preg_match('/^[0-9A-Za-z._-]+$/', $value)) {
        throw new RuntimeException("Unexpected characters in path segment: '$value'");
    }
    return $value;
}

$started = microtime(true);

// 1. Download counts. On failure keep the previous counts (or the baselines), so the site still builds.
try {
    $counts = fetchGitHubDownloadCounts();
    writeFile(SITE_DATA_DIR . '/github-counts.json', jsonEncode($counts));
    echo count($counts) . " GitHub download counts fetched\n";
} catch (Throwable $e) {
    fwrite(STDERR, "Warning: using previous download counts. " . $e->getMessage() . "\n");
}

removeTree($outputDir);
$pageCount = 0;
$sitemap = [];

// 2. Pages.
$pages = [
    'index.php' => '',
    'functionality.php' => 'functionality/',
    'download.php' => 'download/',
    'download_archive.php' => 'download_archive/',
    'changelog.php' => 'changelog/',
    'docs.php' => 'docs/',
    'contact.php' => 'contact/',
    'contact_received.php' => 'contact_received/',
];
foreach ($pages as $template => $path) {
    $vars = $template === 'changelog.php' ? ['changelog_version' => '', 'changelog_build' => ''] : [];
    renderPage($template, "/$path", $vars);
    $pageCount++;
    if ($template !== 'contact_received.php') {
        $sitemap[] = "/$path";
    }
}
renderPage('404.php', '/404.html');
$pageCount++;

// 3. Changelog per version and per build. Include builds that only have a download, so its link works.
$builds = [];
foreach (load_changelog() as $entry) {
    $builds[$entry['version']][(string)$entry['build']] = true;
}
foreach (load_downloads() as $download) {
    if ($download['visible'] && $download['build'] !== null) {
        $builds[$download['version']][$download['build']] = true;
    }
}
foreach ($builds as $version => $versionBuilds) {
    $version = assertPathSegment((string)$version);
    renderPage('changelog.php', "/changelog/$version/", ['changelog_version' => $version, 'changelog_build' => '']);
    $pageCount++;
    foreach (array_keys($versionBuilds) as $build) {
        $build = assertPathSegment((string)$build);
        renderPage('changelog.php', "/changelog/$version/$build/", ['changelog_version' => $version, 'changelog_build' => $build]);
        $pageCount++;
    }
}

// 4. Documentation: overview plus one page per manifest entry, for each version.
// Fragments are published as-is, so first check them all against the allowlist.
$unsafe = [];
foreach (array_keys(doc_versions()) as $docVersion) {
    $files = array_merge(['overview.html'], array_column(doc_manifest($docVersion), 'html_file'));
    foreach (array_unique($files) as $file) {
        foreach (findUnsafeDocHtml(file_get_contents(doc_build_dir($docVersion) . "/$file")) as $problem) {
            $unsafe[] = "docs-build/$docVersion/$file: $problem";
        }
    }
}
if ($unsafe !== []) {
    throw new RuntimeException("Unsafe HTML in documentation, not publishing:\n" . implode("\n", $unsafe));
}

// The sitemap lists every page of "latest", but only the overview of older versions (near-duplicates).
foreach (array_keys(doc_versions()) as $docVersion) {
    $docVersion = assertPathSegment($docVersion);
    renderPage('documentation/page.php', doc_url($docVersion, ''), ['doc_version' => $docVersion, 'doc_slug' => '']);
    $pageCount++;
    $sitemap[] = doc_url($docVersion, '');

    foreach (doc_manifest($docVersion) as $slug => $doc) {
        $slug = assertPathSegment((string)$slug);
        renderPage('documentation/page.php', doc_url($docVersion, $slug), ['doc_version' => $docVersion, 'doc_slug' => $slug]);
        $pageCount++;
        if ($docVersion === 'latest' && doc_has_content($doc)) {
            $sitemap[] = doc_url($docVersion, $slug);
        }
    }
}
writeFile("$outputDir/documentation/index.html",
    "<!DOCTYPE html>\n<meta http-equiv=\"refresh\" content=\"0;url=/documentation/latest/\">\n<a href=\"/documentation/latest/\">hMailServer documentation</a>\n");
echo "$pageCount pages rendered\n";

// 5. Sitemap.
$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
foreach ($sitemap as $path) {
    $xml .= "  <url><loc>" . htmlspecialchars(SITE_URL . $path, ENT_XML1) . "</loc></url>\n";
}
writeFile("$outputDir/sitemap.xml", $xml . "</urlset>\n");

// 6. Lookup data for the Cloudflare Worker, which redirects old URLs:
// download id -> URL/version/build (/download_file?downloadid=N, /changelog?downloadid=N),
// and the slugs of each manual version (/documentation/<v>/?page=<slug>).
$downloadIds = [];
foreach (load_downloads() as $download) {
    if ($download['visible'] && str_starts_with($download['url'], 'https://github.com/hmailserver/hmailserver/releases/download/')) {
        $downloadIds[(string)$download['id']] = ['url' => $download['url'], 'version' => $download['version'], 'build' => $download['build']];
    }
}
writeFile("$outputDir/data/download-ids.json", jsonEncode($downloadIds));

$docSlugs = [];
foreach (array_keys(doc_versions()) as $docVersion) {
    $docSlugs[$docVersion] = array_map('strval', array_keys(doc_manifest($docVersion)));
}
writeFile("$outputDir/data/doc-slugs.json", jsonEncode($docSlugs));

// 7. Static assets. (No CNAME file: for Actions deployments, the custom domain is set in the repo's Pages settings.)
foreach (['css', 'js', 'images', 'documentation', 'favicon.ico', 'robots.txt'] as $asset) {
    copyTree(SOURCE_DIR . "/$asset", "$outputDir/$asset");
}

printf("Site built in %s (%.0f s)\n", realpath($outputDir), microtime(true) - $started);
