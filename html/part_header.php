<?php
    // Page chrome. Optional inputs: $title_prepend (page title), $nav_active (highlighted menu item)
    // and $canonical_url (set by the build for every page).
    // Opens <div class="bootstrap">, which part_footer.php closes.
    $nav_active = $nav_active ?? "";
    $nav_class = fn($item) => $item === $nav_active ? ' class="active"' : '';
    $page_title = isset($title_prepend) ? "$title_prepend - " : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="hMailServer - Free open source email server for Microsoft Windows">
    <meta name="author" content="Martin Knafve">

    <title><?php echo htmlspecialchars($page_title); ?>hMailServer - Free open source email server for Microsoft Windows</title>
    <?php if (isset($canonical_url)): ?>
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">
    <?php endif; ?>

    <link href="/css/bootstrap-in-div.css" rel="stylesheet">
    <link href="/css/site.css" rel="stylesheet">

    <script src="/js/jquery.js"></script>
</head>
<body>
<div class="bootstrap">
    <nav class="navbar navbar-default navbar-static-top navbar-top navbar-shadow" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li<?php echo $nav_class("welcome"); ?>><a href="/">Welcome</a></li>
                    <li<?php echo $nav_class("functionality"); ?>><a href="/functionality">Functionality</a></li>
                    <li<?php echo $nav_class("download"); ?>><a href="/download">Download</a></li>
                    <li<?php echo $nav_class("documentation"); ?>><a href="/documentation/latest/">Documentation</a></li>
                    <li><a href="/forum">Forum</a></li>
                    <li><a href="https://github.com/hmailserver/hmailserver" target="_blank" rel="noopener noreferrer">GitHub</a></li>
                    <li<?php echo $nav_class("contact"); ?>><a href="/contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
