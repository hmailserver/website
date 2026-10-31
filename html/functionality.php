<?php
    $title_prepend = "Functionality";
    $nav_active = "functionality";
    include __DIR__ . "/part_header.php";
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Functionality</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>
                    hMailServer provides all of the important functionality you need to run your own e-mail server. As a user of hMailServer, you get continuous updates and great support from other users and developers in the forum.
                    <br/><br/>
                    hMailServer is a free and <a href="https://github.com/hmailserver/hmailserver/">open source</a> product. Free when it comes to the price, and free when it comes to how you can use or distribute it. hMailServer supports the open email standards POP3, SMTP and IMAP4. This makes the server compatible with most email clients available.
                    <br/>
                </p>
            </div>
            <div class="col-md-6 text-center">
                <div>
                    <img src="/images/scr_hmailadmin_account_medium.jpg" alt="hMailServer Administrator">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md2">
                <br/>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Features</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4> Simple Installation & Configuration</h4>
                    </div>
                    <div class="panel-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    Tired of manually editing text files to configure your server?
                                    Installing and configuring hMailServer is easy and takes only a few minutes. The server comes with an easy-to-use administration tool called hMailServer Administrator.
                                    hMailServer Administrator lets you add domains & accounts, specify settings, enable virus scanning and so on.
                                    <br/><br/>
                                    If you prefer it, there is also a web based frontend available, hMailServer WebAdmin, which can be used to configure all parts of hMailServer.
                                    <br/><br/>
                                </div>
                                <div class="col-md-4">
                                    <img src="/images/src_setup.png" alt="Setup" style="height: 150px; width: 200px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4> Security</h4>
                    </div>
                    <div class="panel-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    hMailServer is pre-configured to have high security when it comes to relaying and authentication so that no one can use your server to send spam messages. It also supports the very popular open source virus scanner ClamAV. Configuring hMailServer to use ClamAV only takes a single click! The server also supports black list servers and other spam-stopping mechanisms such as SPF and MX lookups.
                                    <br/><br/>
                                </div>
                                <div class="col-md-4">
                                    <img src="/images/screenshots/scr_hmailadmin_iprange_small.jpg" alt="IP range settings" style="height: 150px; width: 200px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4> Integrations</h4>
                    </div>
                    <div class="panel-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    hMailServer comes with a COM library that can be used for integration with other software. Using the COM library, it's possible to write scripts and full applications that utilize the features in hMailServer. For example, you can integrate hMailServer into your current IT-systems so that new employees automatically get email accounts. Both hMailServer Administrator and the PHP web-based frontend uses the COM API to manage the server.
                                    <br/><br/>
                                </div>
                                <div class="col-md-4">
                                    <img src="/images/sourcecode.png" alt="Source code" style="height: 150px; width: 200px; margin-top: 5px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4> ... and a few more things, such as</h4>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>POP3, SMTP, IMAP</li>
                            <li>Virtual domains</li>
                            <li>Built-in backup</li>
                            <li>SSL encryption</li>
                            <li>Anti-spam</li>
                            <li>Anti-virus</li>
                            <li>Scripting</li>
                            <li>Server-side rules</li>
                            <li>Multilingual</li>
                            <li>Routing</li>
                            <li>MX backup</li>
                            <li>Multihoming</li>
                            <li>SQL backend</li>
                            <li>Web administration</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include __DIR__ . "/part_footer.php";
?>
