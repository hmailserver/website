<?php
    $title_prepend = "Download";
    $nav_active = "download";
    require_once __DIR__ . "/lib/data.php";

    $latest_stable = null;
    $latest_beta = null;
    foreach (visible_downloads() as $download)
    {
        if ($download["stable"])
            $latest_stable ??= $download;
        else
            $latest_beta ??= $download;
    }

    include __DIR__ . "/part_header.php";
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Download</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Latest version</h3>
                <ul>
                    <?php if ($latest_stable !== null): ?>
                    <li>
                        <a href="<?php echo htmlspecialchars($latest_stable["url"]); ?>" rel="nofollow">Download <?php echo htmlspecialchars("{$latest_stable["name"]} {$latest_stable["version"]} - Build {$latest_stable["build"]}"); ?></a><br/>
                        (<?php echo download_count($latest_stable); ?> downloads since <?php echo htmlspecialchars($latest_stable["date"] ?? ""); ?>. <a href="<?php echo htmlspecialchars(changelog_url($latest_stable["version"])); ?>">Change log</a>)
                    </li>
                    <?php endif; ?>
                </ul>
                <br/>

                <h3>Betas & other downloads</h3>
                Please note that the latest beta may be older than the latest stable release. <br/>
                <br/>
                <ul>
                    <?php if ($latest_beta !== null): ?>
                    <li>
                        <a href="<?php echo htmlspecialchars($latest_beta["url"]); ?>" rel="nofollow">Download <?php echo htmlspecialchars("{$latest_beta["name"]} {$latest_beta["version"]} - Build {$latest_beta["build"]} (BETA)"); ?></a><br/>
                        (<?php echo download_count($latest_beta); ?> downloads since <?php echo htmlspecialchars($latest_beta["date"] ?? ""); ?>. <a href="<?php echo htmlspecialchars(changelog_url($latest_beta["version"])); ?>">Change log</a>)
                    </li>
                    <?php endif; ?>
                </ul>
                <br/>
                <br/>
                It's possible to download older releases on the <a href="/download_archive">archive download page</a>.
            </div>
        </div>
    </div>
<?php
    include __DIR__ . "/part_footer.php";
?>
