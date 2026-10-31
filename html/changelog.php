<?php
    // Inputs: $changelog_version and $changelog_build ("" to include all).
    require_once __DIR__ . "/lib/data.php";

    // A changelog group is "Production" if a matching download is marked stable.
    $stable_builds = [];
    foreach (load_downloads() as $download)
    {
        if ($download["stable"])
            $stable_builds[$download["version"] . "/" . $download["build"]] = true;
    }

    $entries = array_filter(load_changelog(), fn($e) =>
        ($changelog_version == "" || $e["version"] == $changelog_version) &&
        ($changelog_build == "" || $e["build"] == (int)$changelog_build));

    // Same order as the old SQL: version as string desc, build desc, issue asc, id desc.
    usort($entries, fn($a, $b) =>
        strcmp($b["version"], $a["version"]) ?: [$b["build"], $a["issue_id"], $b["id"]] <=> [$a["build"], $b["issue_id"], $a["id"]]);

    // One group per version and build. The date shown is that of the group's first entry.
    $groups = [];
    foreach ($entries as $entry)
    {
        $key = $entry["version"] . "/" . $entry["build"];
        $groups[$key] ??= [
            "version" => $entry["version"],
            "build" => $entry["build"],
            "date" => date("Y-m-d", strtotime((string)$entry["date"])),
            "stable" => isset($stable_builds[$key]),
            "entries" => [],
        ];
        $groups[$key]["entries"][] = $entry;
    }

    $heading = "hMailServer changelog";
    if ($changelog_version != "")
        $heading .= " for $changelog_version";
    if ($changelog_version != "" && $changelog_build != "")
        $heading .= " (Build $changelog_build)";

    include __DIR__ . "/part_header.php";
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo htmlspecialchars($heading); ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php foreach ($groups as $group): ?>
                <?php
                    $title = 'Version <a href="' . htmlspecialchars(changelog_url($group["version"])) . '">' . htmlspecialchars($group["version"]) . '</a>'
                        . ' - Build <a href="' . htmlspecialchars(changelog_url($group["version"], $group["build"])) . '">' . htmlspecialchars($group["build"]) . '</a>'
                        . ' (' . htmlspecialchars($group["date"]) . ')';
                ?>
                <?php if ($group["stable"]): ?>
                <h1 class="changelog-production"><?php echo $title; ?> - Production</h1>
                <?php else: ?>
                <h3><?php echo $title; ?></h3>
                <?php endif; ?>
                <ul>
                    <?php foreach ($group["entries"] as $entry): ?>
                    <li><?php if ($entry["issue_id"] > 0) echo "Issue " . htmlspecialchars($entry["issue_id"]) . ": "; ?><?php echo nl2br(htmlspecialchars($entry["comment"])); ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endforeach; ?>

                <p><a href="/changelog/">Full change log</a></p>
            </div>
        </div>
    </div>
<?php
    include __DIR__ . "/part_footer.php";
?>
