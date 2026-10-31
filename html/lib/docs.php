<?php

// Manual helpers. Each version's content is pre-built into docs-build/<version>/ (manifest.json + HTML fragments).

function doc_versions()
{
    return include __DIR__ . "/../documentation/versions.php";
}

function doc_build_dir($version)
{
    return __DIR__ . "/../../docs-build/$version";
}

function doc_manifest($version)
{
    static $manifests = [];
    if (!isset($manifests[$version]))
    {
        $path = doc_build_dir($version) . "/manifest.json";
        if (!is_file($path))
            throw new RuntimeException("Missing $path. Build the docs for $version first.");
        $manifests[$version] = json_decode(file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);
    }
    return $manifests[$version];
}

// Old links may use a plural form of the slug (e.g. "accounts" for "account").
function doc_resolve_slug($manifest, $slug)
{
    if (isset($manifest[$slug]))
        return $slug;
    if (substr($slug, -1) == "s" && isset($manifest[substr($slug, 0, -1)]))
        return substr($slug, 0, -1);
    if (substr($slug, -2) == "es" && isset($manifest[substr($slug, 0, -2)]))
        return substr($slug, 0, -2);
    return $slug;
}

// URL of a manual page. An empty slug (or "overview") is the version's overview.
function doc_url($version, $slug)
{
    $url = "/documentation/" . rawurlencode($version) . "/";
    if ($slug !== "" && $slug !== "overview" && $slug !== "selectversion")
        $url .= rawurlencode($slug) . "/";
    return $url;
}

// The built fragments link with "?page=<slug>" and "images/<file>", relative to the old URLs.
// Some links are absolute, e.g. "https://www.hmailserver.com/documentation/latest/?page=<slug>".
function doc_rewrite_links($html, $version)
{
    $pattern = '#href="(?:https?://www\.hmailserver\.com/documentation/([a-z0-9.]+)/)?(?:fckblank\.html)?\?page=([^"&\#]*)(\#[^"]*)?"#';
    $html = preg_replace_callback($pattern, function ($m) use ($version) {
        $linkversion = $m[1] !== "" ? $m[1] : $version;
        $slug = doc_resolve_slug(doc_manifest($linkversion), trim(rawurldecode(html_entity_decode($m[2]))));
        return 'href="' . htmlspecialchars(doc_url($linkversion, $slug) . ($m[3] ?? "")) . '"';
    }, $html);

    // The forum moved to the root of its own host.
    $html = preg_replace('#href="https?://(?:www\.)?hmailserver\.com/forum\b/?#', 'href="https://forum.hmailserver.com/', $html);

    return str_replace('src="images/', 'src="/documentation/' . htmlspecialchars($version) . '/images/', $html);
}

// Books are normally just section headings, but a few carry text of their
// own. Older builds predate the manifest flag, so fall back to the type.
function doc_has_content($doc)
{
    if (isset($doc["has_content"]))
        return (bool)$doc["has_content"];

    return empty($doc["is_book"]);
}

// Children of $parentslug, in the order they should be listed.
function doc_children($manifest, $parentslug)
{
    $children = array_filter($manifest, fn($doc) => $doc["parent"] === $parentslug);

    uasort($children, function ($a, $b) {
        return ($a["index"] <=> $b["index"]) ?: strcasecmp($a["title"], $b["title"]);
    });

    return $children;
}

// Slugs from the root down to (and including) $slug.
function doc_path($manifest, $slug)
{
    $path = [];
    while ($slug !== null && isset($manifest[$slug]))
    {
        array_unshift($path, $slug);
        $slug = $manifest[$slug]["parent"];
    }
    return $path;
}

// Depth-first reading order, used for the previous/next links.
function doc_reading_order($manifest, $parentslug = null)
{
    $order = [];
    foreach (doc_children($manifest, $parentslug) as $childslug => $doc)
    {
        if (doc_has_content($doc))
            $order[] = $childslug;

        $order = array_merge($order, doc_reading_order($manifest, $childslug));
    }
    return $order;
}

// [previous slug, next slug] in reading order; null where there is none.
function doc_previous_next($version, $slug)
{
    static $orders = [];
    $orders[$version] ??= doc_reading_order(doc_manifest($version));
    $order = $orders[$version];

    $position = array_search($slug, $order, true);
    if ($position === false)
        return [null, null];

    return [$order[$position - 1] ?? null, $order[$position + 1] ?? null];
}
