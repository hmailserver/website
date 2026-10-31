<?php

// Release and changelog data for the static site build. Source of truth is data/*.json.
// data/github-counts.json is written by scripts/build-site.php (not committed).

define("SITE_DATA_DIR", __DIR__ . "/../../data");

function load_json_file($path)
{
    return json_decode(file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);
}

function load_downloads()
{
    static $downloads = null;
    if ($downloads === null)
        $downloads = load_json_file(SITE_DATA_DIR . "/downloads.json");
    return $downloads;
}

function load_changelog()
{
    static $changelog = null;
    if ($changelog === null)
        $changelog = load_json_file(SITE_DATA_DIR . "/changelog.json");
    return $changelog;
}

// Visible downloads, newest first (same ordering as the old SQL: version as string, build as number).
function visible_downloads()
{
    $downloads = array_values(array_filter(load_downloads(), fn($d) => $d["visible"]));
    usort($downloads, fn($a, $b) =>
        strcmp($b["name"], $a["name"]) ?: strcmp($b["version"], $a["version"]) ?: (int)$b["build"] <=> (int)$a["build"]);
    return $downloads;
}

// Count kept in the old DB, plus GitHub downloads since the export.
function download_count($download)
{
    static $github = null;
    if ($github === null)
    {
        $path = SITE_DATA_DIR . "/github-counts.json";
        $github = is_file($path) ? load_json_file($path) : [];
    }

    $now = $github[$download["url"]] ?? null;
    if ($download["github_baseline"] === null || $now === null)
        return $download["counter_baseline"];

    return $download["counter_baseline"] + max(0, $now - $download["github_baseline"]);
}

function changelog_url($version = "", $build = "")
{
    $url = "/changelog/";
    if ($version != "")
        $url .= rawurlencode($version) . "/";
    if ($version != "" && $build != "")
        $url .= rawurlencode($build) . "/";
    return $url;
}
