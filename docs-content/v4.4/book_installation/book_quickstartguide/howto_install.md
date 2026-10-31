---
title: "Installation tutorial"
slug: howto_install
parent: book_quickstartguide
index: 0
is_book: false
---

## Overview

This page describes the required steps to install hMailServer. Before installing hMailServer, you should ensure that your computer fulfills the [system requirements](?page=system_requirements).

## Step 1: Download

The first step is of to download hMailServer. The installation program is available for download at the [download page](http://www.hmailserver.com/?page=download). It is recommended that you download the latest stable version. The file you download has a name of the form *hMailServer-version-build.exe*. As an example, *version-build* might stand for *4.1-Build-136*.

## Step 2: Install

1. Double-click on the downloaded file to launch the setup. The first dialog which is shown is the Welcome dialog, in this one, simply click Next.
2. Select the destination folder and click Next. You should select a local drive and not a network folder. It is possible to install hMailServer on removable devices, but you will not be able to run hMailServer from the device on another computer.
3. Select which components you want to install and click Next. On the server, you should install all available components. If you have already installed the hMailServer server on another computer and you want to manage that remotely, you only need to install the Administrative tools.
4. Select database type and click Next. hMailServer needs a database server (MySQL or MSSQL) to store messages and configuration data. During installation you can select whether you wish to install hMailServer's own built-in MySQL database. If you already have a MySQL or MSSQL server running on your computer, select to use an external database.   
  
If you choose the default, that is, the built-in MySQL, the installation software will automatically create the database and tables needed by hMailServer. On the other hand, if you wish to use an external database instead, you will have to manually run the hMailServer Database Setup wizard after the installation has completed. It will guide you through the process of creating the database and tables. Note that hMailServer Database Setup will create the database as well as all the tables that hMailServer needs.
5. Select which start menu folder you want to place the hMailServer icons in and click Next.
6. Click Install to begin the copying of the files.
7. After the files have been installed, you need to provide the installation program with a main hMailServer password. In 4.3 and later, a main password is used to increase security. The password can be anything you like as long as it's longer than 5 characters. You will need the password later on when performing server administration, so don't forget it. You only need to specify the password the first time you install hMailServer
8. After you have finished the installation, it's time to start hMailServer Administrator (found in the start menu). The first thing which appears is the *Connect* dialog. This dialog allows you to connect to different hMailServer installations in your network. Normally, you will want to connect to *localhost*. Select *localhost*, and click *Connect*. In the password dialog, enter your main hMailServer password and click OK.

## Step 3: Post-installation tasks

### Service dependencies (hMailServer 4.x and later)

If you are using the built-in MySQL, you do not need to do anything about service dependency. If you are using MSSQL or an external version of MySQL already running on the same machine, you should run the appropriate script from the *hMailServer/Addons/Service dependencies* folder.

The hMailServer installation automatically tries to set service dependency, but in some cases it's not possible for hMailServer to properly detect which service it should be dependent on. Because of this, you should manually set service dependency by running one of the scripts in the folder above. If you don't set the service dependency, there's a risk that hMailServer won't be able to connect to the database server after reboot. (This happens if hMailServer is started before the database server after reboot)

### DNS configuration

After installing hMailServer, make sure you configure your DNS server correctly. For SMTP to work, you must define MX records for your domain. MX stands for Mail eXchanger. Simply put, the MX records tell other email servers what server in your domain is responsible for handling mail. Here is [more information about MX records](?page=ts_mx_problems).

## Step 4: Configuring the server

The tutorial for configuring the server is [found here](?page=basic_configuration).
