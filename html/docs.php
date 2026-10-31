<?php
    $title_prepend = "Documentation";
    $nav_active = "documentation";
    require_once __DIR__ . "/lib/docs.php";
    $versions = doc_versions();
    include __DIR__ . "/part_header.php";
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Documentation</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4> Select hMailServer version</h4>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <?php foreach ($versions as $slug => $label): ?>
                            <li><a href="/documentation/<?php echo htmlspecialchars($slug); ?>/"><?php echo htmlspecialchars($label); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include __DIR__ . "/part_footer.php";
?>
