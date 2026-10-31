<?php

declare(strict_types=1);

/**
 * Download counts for all assets of all hMailServer GitHub releases.
 * Uses GITHUB_TOKEN when set (higher rate limit).
 *
 * @return array<string, int> browser_download_url -> download_count
 */
function fetchGitHubDownloadCounts(): array
{
    $headers = [
        'User-Agent: hmailserver-website',
        'Accept: application/vnd.github+json',
    ];
    $token = getenv('GITHUB_TOKEN');
    if ($token !== false && $token !== '') {
        $headers[] = "Authorization: Bearer $token";
    }
    $context = stream_context_create(['http' => ['header' => implode("\r\n", $headers), 'timeout' => 30]]);

    $counts = [];
    for ($page = 1; ; $page++) {
        $url = "https://api.github.com/repos/hmailserver/hmailserver/releases?per_page=100&page=$page";
        $body = @file_get_contents($url, false, $context);
        if ($body === false) {
            throw new RuntimeException("GitHub API request failed: $url");
        }
        $releases = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
        if ($releases === []) {
            break;
        }
        foreach ($releases as $release) {
            foreach ($release['assets'] as $asset) {
                $counts[$asset['browser_download_url']] = (int)$asset['download_count'];
            }
        }
    }
    return $counts;
}
