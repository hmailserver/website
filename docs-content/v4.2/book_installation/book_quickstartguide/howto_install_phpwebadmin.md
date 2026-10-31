---
title: "Installing PHPWebAdmin"
slug: howto_install_phpwebadmin
parent: book_quickstartguide
index: 0
is_book: false
---

This page describes how to install PHPWebAdmin, the PHP administration front-end for hMailServer.

## Prerequisites

- Apache or IIS (or any other PHP compatible web server)
- PHP >= 4.3.11 or PHP >= 5.0.3. Due to bugs in PHP 4.3.10, hMailServer does not work with that version.

## Step 1: Copy the files

The first step is to copy PHPWebAdmin from the hMailServer directory to your web root directory. The web root differs between web servers so check your web server's documentation if you're unsure where your web root is located. Copy the entire PHPWebAdmin from /Program Files/hMailServer to your web root. Example: If your web root is *C:/wwwroot*, copy PHPWebAdmin to *C:/wwwroot*, so that you get *C:/wwwroot/PHPWebAdmin*. 

The description below assumes your web root is *C:/wwwroot*.

## Step 2: Setup

Go to the PHPWebAdmin directory in the web root.

1. Make sure there is a sub-directory named template_c and one named temp. If they do not exist, create them.
2. Rename the file config-dist.php to config.php
3. The file config.php contains the basic settings for PHPWebAdmin and needs to be modified to correctly adjust it for your system:  
  

   - Set the value of rootpath to your root web directory where PHPWebAdmin is placed.  
 Example:  
 *$hmail_config['rootpath'] = "C:/wwwroot/PHPWebAdmin/";*
  - Set the value of rooturl to the URL where the PHPWebAdmin will be located.  
 Example:  
 *$hmail_config['rooturl'] = "http://localhost/PHPWebAdmin/";*
  - Specify your username and password (hMailServer 3.x).  
 Example:  
 *$hmail_config['admin'] = "administrator";  
 $hmail_config['adminpassword'] = "mysecretpassword";*
4. Open up php.ini, and make sure that short_open_tag is set to On
5. If you're using IIS6, you need to follow [these steps.](?page=howto_dcom_permissions)

## Step 3: Use it

Point your web browser to http://localhost/PHPWebAdmin and log in with the username and password you specified in config.php. If you are using hMailServer 4 or later, you should log in using your hMailServer account.

## Common configuration errors

- When you specify paths and URLs in the config file, it is very important that you use the forward slash /, and not the backward slash , as folder separator. It is also very important that you end every path and every URL with /.
- If you are using IIS, you may need to give IUSR_[yourcomputername] modify and write access to the folders PHPWebAdmintemplate_c and PHPWebAdmintemp
- If you get error messages containing E_NOTICE, you should turn off notices. This is done by changing the value of error_reporting in php.ini
- If you are using Microsoft SQL Server for hMailServer, you may need to give the user IUSR_[computername] access to the hMailServer database.

## Example

This example assumes that your web root is C:/Program Files/Apache Group/Apache2/htdocs/.

<pre>$hmail_config['rootpath'] = "C:/Program Files/Apache Group/Apache2/htdocs/PHPWebAdmin/"; $hmail_config['rooturl'] = "http://localhost/PHPWebAdmin/"; $hmail_config['includepath'] = $hmail_config['rootpath'] . "include/"; $hmail_config['temppath'] = $hmail_config['rootpath'] . "temp/"; $hmail_config['pluginpath'] = $hmail_config['rootpath'] . "plugins/"; $hmail_config['admin'] = "myusername"; $hmail_config['adminpassword'] = "secretpasword"; $hmail_config['defaultlanguage'] = "english"; $hmail_config['defaulttheme'] = "default";</pre>
