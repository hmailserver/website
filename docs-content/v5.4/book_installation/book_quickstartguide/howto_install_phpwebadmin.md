---
title: "Installing PHPWebAdmin"
slug: howto_install_phpwebadmin
parent: book_quickstartguide
index: 20
is_book: false
---

## Overview

This page describes how to install hMailServer WebAdmin, the PHP administration front-end for hMailServer.

### Prerequisites

<ul>
    <li>Apache or IIS (or any other PHP compatible web server)</li>
    <li>PHP &gt;= 4.3.11 or PHP &gt;= 5.0.3. Due to bugs in PHP 4.3.10, hMailServer does not work with that version.<br>
    For php version 5.3.15 / 5.4.5 and higher the COM API has been disabled as a module. The error probably will be <span class="Code">PHP Fatal error:  Class 'COM' not found in \phpwebadmin\initialize.php on line xx</span>. Make sure you edit the php.ini file has been edited with the value <span class="Code">extension=php_com_dotnet.dll</span> in the extentions.</li>
    <li>The PHP setting<span class="Code"> register_globals</span> must be set to off for PHPWebAdmin to work properly.</li>
    <li>In the PHP configuration, the following settings must be configured for PHPWebAdmin to work properly:
    <ul>
        <li><span class="Code">register_globals</span> must be set to off</li>
        <li><span class="Code">display_errors</span> must be set to off</li>
    </ul>
    </li>
</ul>

### Step 1: Copy the files

<p>The first step is to copy PHPWebAdmin from the hMailServer directory to your web root directory. The web root differs between web servers so check your web server's documentation if you're unsure where your web root is located. Copy the entire PHPWebAdmin from <span class="Code">C:\Program Files/hMailServer</span>  to your web root. Example: If your web root is <span class="Code">C:/wwwroot,</span> copy PHPWebAdmin to <span class="Code">C:\wwwroot</span>, so that you get <span class="Code">C:\wwwroot\PHPWebAdmin</span>.  <br>
<br>
The description below assumes your web root is <span class="Code">C:\wwwroot</span>.</p>

### Step 2: Setup

Go to the WebAdmin directory in the web root.

<ol>
    <li>Create a copy of the file named <span class="Code">config-dist.php</span> and give it the name <span class="Code">config.php</span>.</li>
    <li>The file <span class="Code">config.php</span> contains the basic settings for PHPWebAdmin and needs to be modified to correctly adjust it for your system:<br>
    <br>
    <ul>
        <li>Set the value of rooturl to the URL where the WebAdmin will be accessed.<br>
        <br>
        Example:<br>
        <span class="Code">$hmail_config['rooturl'] = "http://localhost/PHWebAdmin/"; 					</span><span class="Code"><em><br>
        <br>
        </em></span></li>
    </ul>
    </li>
    <li>If you're using IIS6 or run your web server (Apache or IIS) as a specific user account with limited permissions, you need to follow <a href="?page=howto_dcom_permissions">these steps.</a></li>
    <li>Create a <a href="http://www.robotstxt.org/">robots.txt</a> file in the web server root to prevent Google and other search bots from indexing hMailServer WebAdmin. If a security vulnerability is found in PHPWebAdmin, this will make it harder for attacker to</li>
</ol>

### Step 3: Use it

Point your web browser to http://localhost/PHPWebAdmin and log in with your hMailServer username and password.

When you upgrade your hMailServer installation to a later version, make sure to copy the latest WebAdmin from the hMailServer installation directory to your web directory. If you do not do this, you will get an error message when trying to access WebAdmin.

### Common configuration errors

There's a few common set up mistakes. Read more in the [troubleshooting guide](?page=ts_setup_phpwebadmin).

 

 
