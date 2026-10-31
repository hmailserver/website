---
title: "Installing PHPWebAdmin"
slug: howto_install_phpwebadmin
parent: book_quickstartguide
index: 20
is_book: false
---

This page describes how to install PHPWebAdmin, the PHP administration front-end for hMailServer.

## Prerequisites

- Apache or IIS (or any other PHP compatible web server)
- PHP >= 4.3.11 or PHP >= 5.0.3. Due to bugs in PHP 4.3.10, hMailServer does not work with that version.
- The PHP setting register_globals must be set to off for PHPWebAdmin to work properly.

## Step 1: Copy the files

The first step is to copy PHPWebAdmin from the hMailServer directory to your web root directory. The web root differs between web servers so check your web server's documentation if you're unsure where your web root is located. Copy the entire PHPWebAdmin from

<span class="Code">C:/Program Files/hMailServer</span>

to your web root. Example: If your web root is

<span class="Code">C:/wwwroot,</span>

copy PHPWebAdmin to

<span class="Code">C:/wwwroot</span>

, so that you get

<span class="Code">C:/wwwroot/PHPWebAdmin</span>

. 

The description below assumes your web root is

<span class="Code">C:/wwwroot</span>

.

## Step 2: Setup

Go to the PHPWebAdmin directory in the web root.

<ol>
    <li>Rename the file config-dist.php to config.php<br></li>
    <li>The file config.php contains the basic settings for PHPWebAdmin and needs to be modified to correctly adjust it for your system:<br><br>
    <ul>
        <li>Set the value of rootpath to your root web directory where PHPWebAdmin is placed.<br> 				Example:<br> 				   <span class="Code">$hmail_config['rootpath'] = "C:/wwwroot/PHPWebAdmin/"; 				</span><br><br> 			</li>
        <li>Set the value of rooturl to the URL where the PHPWebAdmin will be located.<br> 				Example:<br> 				   <span class="Code">$hmail_config['rooturl'] = "http://localhost/PHPWebAdmin/"; 					</span><span class="Code"><em><br><br></em> 			</span></li>
    </ul>
    </li>
    <li>Open up php.ini, and make sure that short_open_tag is set to On (No longer necessary in hMailServer 4.4 or above!)<br></li>
    <li>If you're using IIS6 or run your web server (Apache or IIS) as a specific user account with limited permissions, you need to follow <a href="?page=howto_dcom_permissions">these steps.</a></li>
</ol>

## Step 3: Use it

Point your web browser to http://localhost/PHPWebAdmin and log in with the username and password you specified in config.php. If you are using hMailServer 4 or later, you should log in using your hMailServer account.

When you upgrade your hMailServer installation to a later version, make sure to copy the latest PHPWebAdmin from the hMailServer installation directory to your web directory. Not doing this may prevent PHPWebAdmin from working.

## Common configuration errors

There's a few common set up mistakes. Read more in the [troubleshooting guide](?page=ts_setup_phpwebadmin).

## Example

This example assumes that your web root is

<span class="Code">C:/Program Files/Apache Group/Apache2/htdocs</span>

/.

<pre>$hmail_config['rootpath'] = "C:/Program Files/Apache Group/Apache2/htdocs/PHPWebAdmin/";  $hmail_config['rooturl'] = "http://localhost/PHPWebAdmin/";  $hmail_config['includepath'] = $hmail_config['rootpath'] . "include/";  $hmail_config['temppath'] = $hmail_config['rootpath'] . "temp/";  $hmail_config['pluginpath'] = $hmail_config['rootpath'] . "plugins/";  $hmail_config['defaultlanguage'] = "english";  $hmail_config['defaulttheme'] = "default"; </pre>
