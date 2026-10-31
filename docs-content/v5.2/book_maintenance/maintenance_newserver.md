---
title: "Moving to a new server"
slug: maintenance_newserver
parent: book_maintenance
index: 20
is_book: false
---

## Overview

This document describes how to move hMailServer from one physical server to another. The procedure is split up into six steps.

1. Check requirements
2. Install hMailServer on new server
3. Backup your system
4. Move the data
5. Check TCP/IP-related settings
6. Confirm the migration

If it is the first time you're following these steps, it's recommended that you do it in a test installation prior to doing it in a production installation. This is to ensure that you fully understand exactly what you need to do.

## Step 1 - Check requirements

Before you begin moving your hMailServer installation to a new server, you should check that the new server matches the hMailServer requirements. Apart from the [standard requirements](?page=system_requirements), the following also applies during a migration:

### Data directory path

The hMailServer database contains links to the message files on disk. For each message in the database, the full path to the file on disk is specified. This means that when you migrate to another server, the Data directory must be placed in the same location for the migration to be successful. If the Data directory is stored for example on another drive, D: instead of C:, hMailServer will not be able to find the messages after the migration.

## Step 2 - Install hMailServer on new server

Before you begin the actual data migration, you should install hMailServer on the new server. It is critical that you install the same version of hMailServer as you used on the old server, and that you install it in the same directory as on the old server. If you had hMailServer in C:\hMailServer on old server, you should have it in the same path on the new.

## Step 3 - Backup your system

Before you [backup your system](?page=backup_restore), you typically want to stop your hMailServer service to make sure that no changes are made during the backup. It is of-course recommended that you notify your users in good time before doing this.

The hMailServer configuration and data will be copied manually from the old server to the new one. The backup is only needed if something goes very wrong during this process and you need to restore the old server.

## Step 4 - Move the data

There are three things you need to copy:

### Data directory

The data directory contains all messages and must be copied from the old server to the new one (unless they are located on a SAN which is accessible by both servers). It's important that you copy the files to the same directory on the new server as on the old one. If the data files were located in C:\Program Files\hMailServer\Data on the old server, they need to be located in the same location on the new one.

### Customizations

Any customizations you may have to hMailServer must be copied from the old server to the new one. This typically consists of modifications to the hMailServer script file.

### Database

The tasks involved in this step depends on what database server type you are using.

*Built in MySQL*

> If you are using the built-in MySQL server, you can copy the entire Data and MySQL directories from the old server to the new server. If you do this, you also need to copy the Database password from hMailServer.ini on the old server to the new server so that hMailServer can log on the database server.
> 
> 
> Before copying the directories, make sure that both the MySQL and hMailServer service is stopped.

*External MySQL server*

> One method is to drop the hMailServer database on the new server, than copying the hMailServer database from the old server to the new one, or to do an export from the old server and import it into the new.

*SQL Server*

> If you want to move your hMailServer database to a new Microsoft SQL Server installation one method is to backup the database and restore it on the new server. If you have created users and logins specifically for the hMailServer, you need to ensure that they still exists and are set up properly on the new installation

## Step 5 - TCP/IP-related settings

After moving the data, remember to:

- Update any MX record which was pointing at the old host name.
- Update the host name in your hMailServer configuration (if it has changed)
- Check that your Windows Firewall is not blocking traffic to hMailServer

## Step 6 - Confirm the migration

- Confirm that you can send email to your server from an external server
- Confirm that you can log on the new server and access your email
- Notify your users that the migration is complete, and optionally (if required) instruct them to update their email clients with the new host information.
