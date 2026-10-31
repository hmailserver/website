<?php
    $nav_active = "welcome";
    include __DIR__ . "/part_header.php";
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Welcome</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>
                    hMailServer is a free, open source, e-mail server for Microsoft Windows. It's used by Internet service providers, companies, governments, schools and enthusiasts in all parts of the world.
                    <br/><br/>
                    It supports the common e-mail protocols (IMAP, SMTP and POP3) and can easily be integrated with many existing web mail systems. It has flexible score-based spam protection and can attach to your virus scanner to scan all incoming and outgoing email.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <div>
                    <br/>
                    <img src="/images/top_picture.png" alt="hMailServer" style="margin: 10px; max-width:100%; max-height:100%;">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md2">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Core features</h3>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Free & Open Source</h4>
                    </div>
                    <div class="panel-body">
                        <p>Licensed under AGPLv3, hMailServer can be used for free in most commercial scenarios. It's source code is available for anyone to <a href="https://github.com/hmailserver/hmailserver/">read or extend at GitHub</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Built-in Anti-Spam</h4>
                    </div>
                    <div class="panel-body">
                        <p>hMailServer comes with a set of built-in anti spam features such as SPF, SURBL. It can also be integrated with 3rd party anti spam systems such as <a href="http://www.jam-software.com/spamassassin/">SpamAssassin</a> and <a href="http://sourceforge.net/projects/assp/">ASSP</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Webmail</h4>
                    </div>
                    <div class="panel-body">
                        <p>Any webmail system which supports IMAP and SMTP can be used with hMailServer. <a href="http://roundcube.net/">RoundCube</a> and <a href="http://squirrelmail.org/">SquirrelMail</a> are popular webmail systems which are often used with hMailServer.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include __DIR__ . "/part_footer.php";
?>
