<?php

declare(strict_types=1);

// Checks pre-built manual HTML against an allowlist before it is published.
// The "latest" manual comes from the hmailserver repo unreviewed by this repo, and the forum
// shares the domain, so a script in the docs could act as a logged-in forum user.
// Two layers: a raw-text check, and a DOM allowlist of tags, attributes, URL schemes and CSS properties.
// libxml doesn't parse HTML exactly like browsers (older versions read <textarea> content as markup),
// so the raw-text layer looks at the whole text, not only at what looks like a tag. Elements whose
// content browsers treat as raw text (textarea, title, xmp, ...) are forbidden outright.

const DOC_ALLOWED_TAGS = [
    'a', 'b', 'blockquote', 'br', 'code', 'div', 'em', 'font', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'hr',
    'i', 'img', 'li', 'ol', 'p', 'pre', 'span', 'strong', 'sub', 'sup', 'table', 'tbody', 'td', 'th',
    'thead', 'tr', 'u', 'ul',
];

const DOC_ALLOWED_ATTRIBUTES = [
    '*' => ['class', 'id', 'style', 'title'],
    'a' => ['href', 'name'],
    'img' => ['src', 'alt', 'width', 'height', 'border'],
    'table' => ['border', 'cellpadding', 'cellspacing', 'width'],
    'td' => ['valign', 'align', 'width', 'colspan', 'rowspan'],
    'th' => ['valign', 'align', 'width', 'colspan', 'rowspan'],
    'font' => ['color', 'face', 'size'],
    'ol' => ['start'],
];

// Text formatting only. Notably absent: position (overlays) and anything taking url().
const DOC_ALLOWED_CSS_PROPERTIES = [
    'background-color', 'color', 'display', 'float', 'font-family', 'font-size', 'font-style',
    'font-variant-caps', 'font-variant-ligatures', 'font-weight', 'height', 'letter-spacing',
    'margin-left', 'orphans', 'text-align', 'text-decoration', 'text-decoration-color',
    'text-decoration-style', 'text-decoration-thickness', 'text-indent', 'text-transform',
    'vertical-align', 'white-space', 'widows', 'width', 'word-spacing', '-webkit-text-stroke-width',
];

/** @return list<string> Problems found; empty if the fragment is safe to publish. */
function findUnsafeDocHtml(string $html): array
{
    $problems = [];

    // Raw-text layer.
    $rawChecks = [
        '/<\s*\/?\s*(script|iframe|frame|object|embed|applet|svg|math|base|meta|link|style|form|input|button|select|textarea|template|noscript|xmp|plaintext|noembed|noframes|title)\b/i' => 'forbidden element',
        // Anywhere in the text, not only inside "<...>": where a tag ends depends on the parser.
        '/[\s\/"\'`]on[a-z]+\s*=/i' => 'event handler attribute',
        '/(javascript|vbscript)\s*:/i' => 'script URL',
        '/<[^>]*data\s*:/i' => 'data URL',
        '/[\x00-\x08\x0b\x0e-\x1f]/' => 'control character',
        '/<!--|<!\[|<\?/' => 'comment, CDATA or processing instruction',
    ];
    foreach ($rawChecks as $pattern => $problem) {
        if (preg_match($pattern, $html, $m)) {
            $problems[] = "$problem: " . substr($m[0], 0, 80);
        }
    }

    // DOM allowlist layer.
    $dom = new DOMDocument();
    $previous = libxml_use_internal_errors(true);
    $dom->loadHTML('<?xml encoding="utf-8"?><div id="doc-safety-root">' . $html . '</div>');
    libxml_clear_errors();
    libxml_use_internal_errors($previous);

    $root = $dom->getElementById('doc-safety-root');
    if ($root === null) {
        return [...$problems, 'could not parse HTML'];
    }

    foreach ($root->getElementsByTagName('*') as $element) {
        $tag = strtolower($element->nodeName);
        if (!in_array($tag, DOC_ALLOWED_TAGS, true)) {
            $problems[] = "tag <$tag> not allowed";
            continue;
        }
        foreach ($element->attributes as $attribute) {
            $name = strtolower($attribute->name);
            $allowed = array_merge(DOC_ALLOWED_ATTRIBUTES['*'], DOC_ALLOWED_ATTRIBUTES[$tag] ?? []);
            if (!in_array($name, $allowed, true)) {
                $problems[] = "attribute $name on <$tag> not allowed";
            } elseif ($name === 'href' || $name === 'src') {
                $allowedSchemes = $name === 'src' ? ['http', 'https'] : ['http', 'https', 'mailto'];
                if (!isAllowedDocUrl($attribute->value, $allowedSchemes)) {
                    $problems[] = "URL not allowed in $name on <$tag>: " . substr($attribute->value, 0, 80);
                }
            } elseif ($name === 'style' && !isAllowedDocStyle($attribute->value)) {
                $problems[] = "style not allowed on <$tag>: " . substr($attribute->value, 0, 80);
            }
        }
    }

    return $problems;
}

// Relative URLs, or absolute ones with an allowed scheme. Browsers ignore whitespace and control characters in schemes.
function isAllowedDocUrl(string $url, array $allowedSchemes): bool
{
    $url = preg_replace('/[\x00-\x20\x7f]+/', '', $url);
    if (!preg_match('/^([^\/?#]*?):/', $url, $m)) {
        return true;
    }
    return in_array(strtolower($m[1]), $allowedSchemes, true);
}

function isAllowedDocStyle(string $style): bool
{
    foreach (explode(';', $style) as $declaration) {
        if (trim($declaration) === '') {
            continue;
        }
        [$property, $value] = array_pad(explode(':', $declaration, 2), 2, '');
        if (!in_array(strtolower(trim($property)), DOC_ALLOWED_CSS_PROPERTIES, true)) {
            return false;
        }
        // Plain values only: no url(), expression() or escapes. rgb() colours are fine.
        $value = strtolower(trim($value));
        if (!preg_match('/^[a-z0-9 #%.,!\'"()\-]*$/', $value) || preg_match('/\b(?!rgb\()[a-z-]+\(/', $value)) {
            return false;
        }
    }
    return true;
}
