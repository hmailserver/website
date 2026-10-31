<?php
    $title_prepend = "Download archive";
    require_once __DIR__ . "/lib/data.php";
    include __DIR__ . "/part_header.php";
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Download archive</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="download-archive">
                    <thead>
                        <tr>
                            <th>Version</th>
                            <th>Production</th>
                            <th>Date</th>
                            <th>Downloads</th>
                            <th>Download</th>
                            <th>Change log</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (visible_downloads() as $download): ?>
                        <tr>
                            <td><?php echo htmlspecialchars("{$download["version"]} - Build {$download["build"]}"); ?></td>
                            <td><?php echo $download["stable"] ? "Yes" : "No"; ?></td>
                            <td><?php echo htmlspecialchars($download["date"] ?? "Not specified"); ?></td>
                            <td><?php echo download_count($download); ?></td>
                            <td><a href="<?php echo htmlspecialchars($download["url"]); ?>" rel="nofollow">Download</a></td>
                            <td><a href="<?php echo htmlspecialchars(changelog_url($download["version"], $download["build"])); ?>" rel="nofollow">Change log</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
    include __DIR__ . "/part_footer.php";
?>
