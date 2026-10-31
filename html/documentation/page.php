<?php
    // Manual page. Inputs: $doc_version (e.g. "latest", "v5.6") and $doc_slug ("" for the overview).
    require_once __DIR__ . "/../lib/docs.php";

    $versions = doc_versions();
    $manifest = doc_manifest($doc_version);

    if ($doc_slug === "")
    {
        $documenttitle = "hMailServer documentation";
        $documenttext = file_get_contents(doc_build_dir($doc_version) . "/overview.html");
    }
    else
    {
        $documenttitle = $manifest[$doc_slug]["title"];
        $documenttext = file_get_contents(doc_build_dir($doc_version) . "/" . $manifest[$doc_slug]["html_file"]);
    }

    $documenttext = doc_rewrite_links($documenttext, $doc_version);
    $documentpath = $doc_slug !== "" ? doc_path($manifest, $doc_slug) : [];
    [$previousslug, $nextslug] = $doc_slug !== "" ? doc_previous_next($doc_version, $doc_slug) : [null, null];

    $title_prepend = $documenttitle;
    $nav_active = "documentation";
    include __DIR__ . "/../part_header.php";
?>

    <div class="container doc-container">
       <div class="row">
            <div class="col-lg-12 doc-content">
                <?php if (count($documentpath) > 1): ?>
                <ol class="breadcrumb doc-breadcrumb">
                    <li><a href="<?php echo doc_url($doc_version, ""); ?>">Documentation</a></li>
                    <?php foreach (array_slice($documentpath, 0, -1) as $crumbslug): ?>
                        <?php $crumb = $manifest[$crumbslug]; ?>
                        <li>
                            <?php if (doc_has_content($crumb)): ?>
                                <a href="<?php echo htmlspecialchars(doc_url($doc_version, $crumbslug)); ?>"><?php echo htmlspecialchars($crumb['title']); ?></a>
                            <?php else: ?>
                                <?php echo htmlspecialchars($crumb['title']); ?>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                    <li class="active"><?php echo htmlspecialchars($documenttitle); ?></li>
                </ol>
                <?php endif; ?>

                <h1 class="page-header clearfix">
                    <?php echo htmlspecialchars($documenttitle); ?>
                    <div class="dropdown pull-right" style="margin-top: 8px;">
                        <button class="btn btn-default dropdown-toggle" type="button" id="versionSwitcher" data-toggle="dropdown">
                            <?php echo htmlspecialchars($versions[$doc_version]); ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="versionSwitcher">
                            <?php foreach ($versions as $versionslug => $label): ?>
                            <?php
                                // Same page in the other version, or its overview if that version lacks it.
                                $othermanifest = doc_manifest($versionslug);
                                $otherslug = doc_resolve_slug($othermanifest, $doc_slug);
                                $versionurl = doc_url($versionslug, isset($othermanifest[$otherslug]) ? $otherslug : "");
                            ?>
                            <li<?php if ($versionslug === $doc_version) echo ' class="active"'; ?>>
                                <a href="<?php echo htmlspecialchars($versionurl); ?>"><?php echo htmlspecialchars($label); ?></a>
                            </li>
                            <?php endforeach; ?>
                            <li role="separator" class="divider"></li>
                            <li><a href="/docs/">Browse all versions</a></li>
                        </ul>
                    </div>
                </h1>

                <?php echo $documenttext; ?>

                <?php if ($previousslug !== null || $nextslug !== null): ?>
                <nav class="doc-pager clearfix" aria-label="Documentation pages">
                    <?php if ($previousslug !== null): ?>
                    <a class="doc-pager-previous" href="<?php echo htmlspecialchars(doc_url($doc_version, $previousslug)); ?>">
                        <span class="doc-pager-label">&laquo; Previous</span>
                        <span class="doc-pager-title"><?php echo htmlspecialchars($manifest[$previousslug]['title']); ?></span>
                    </a>
                    <?php endif; ?>
                    <?php if ($nextslug !== null): ?>
                    <a class="doc-pager-next" href="<?php echo htmlspecialchars(doc_url($doc_version, $nextslug)); ?>">
                        <span class="doc-pager-label">Next &raquo;</span>
                        <span class="doc-pager-title"><?php echo htmlspecialchars($manifest[$nextslug]['title']); ?></span>
                    </a>
                    <?php endif; ?>
                </nav>
                <?php endif; ?>
            </div>
        </div>

       <div class="row">
            <div class="col-lg-12">
                <h2>Search documentation</h2>
                <?php
                    // Scope the search to the version being read, rather than
                    // to every version of the manual at once.
                    $searchscope = "www.hmailserver.com/documentation/" . $doc_version;
                ?>
                <form class="doc-search form-inline" method="get" action="https://www.google.com/custom" role="search">
                    <label class="sr-only" for="docSearchInput">Search the documentation</label>
                    <input type="text" class="form-control" id="docSearchInput" name="q" size="31" maxlength="255">
                    <button class="btn btn-default" type="submit" name="sa">Search</button>
                    <input type="hidden" name="cof" value="S:https://www.hmailserver.com;AH:center;LH:100;L:https://www.hmailserver.com/images/toppic4.gif;LW:222;AWFID:a1d4d0dbf07ebb95;">
                    <input type="hidden" name="domains" value="<?php echo htmlspecialchars($searchscope); ?>">
                    <input type="hidden" name="sitesearch" value="<?php echo htmlspecialchars($searchscope); ?>">
                </form>
            </div>
        </div>
     </div>

<?php
    include __DIR__ . "/../part_footer.php";
?>
