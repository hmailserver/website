---
title: "Installation tutorial"
slug: howto_install
parent: book_quickstartguide
index: 0
is_book: false
---

This page gives you information on how to install hMailServer.

## Step 1: Download

The first step is of course to download hMailServer. The installation program is available for download at the [download page](http://www.hmailserver.com/?page=download). It is recommended that you download the latest stable version. The following instructions assume that you have version 3.3 or later. The file you download is of the form *hMailServer-version-build.exe*. As an example, *version-build* might stand for *4.1-Build-136*.

## Step 2: Install

Double-click on the file to launch the setup. hMailServer needs a database server (MySQL or MSSQL) to store messages and configuration data. During installation you can select whether you wish to install hMailServer's own built-in MySQL database. If you already have a MySQL or MSSQL server running on your computer, select to use an external database. 

If you choose the default, that is, the built-in MySQL, the installation software will automatically create the database and tables needed by hMailServer. On the other hand, if you wish to use an external database instead, you will have to manually run the hMailServer Database Setup wizard after the installation has completed. It will guide you through the process of creating the database and tables. Note that hMailServer Database Setup will create the database as well as all the tables that hMailServer needs.

## Step 3: After installation

### Service dependencies (hMailServer 4.x and later)

If you are using the built-in MySQL, you do not need to do anything about service dependency. If you are using MSSQL or an external version of MySQL already running on the same machine, you should run the appropriate script from the *hMailServerAddonsService dependencies* folder.The hMailServer installation automatically tries to set service dependency, but in some cases it's not possible for hMailServer to properly detect which service it should be dependent on. Because of this, you should manually set service dependency by running one of the scripts in the folder above. If you don't set the service dependency, there's a risk that hMailServer won't be able to connect to the database server after reboot. (This happens if hMailServer is started before the database server after reboot)

### DNS configuration

After installing hMailServer, make sure you configure your DNS server correctly. For SMTP to work, you must define MX records for your domain. MX stands for Mail eXchanger. Simply put, the MX records tell other email servers what server in your domain is responsible for handling mail. Here is [more information about MX records](?page=ts_mx_problems).

## Notes

- By default hMailServer is installed in C:Program FileshMailServer. The folder structure that hMailServer creates is described [here.](?page=folderstructure)

## Step 4: Configuring the server

The tutorial for configuring the server is [found here](?page=basic_configuration).
