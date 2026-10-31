---
title: "Backup & Restore"
slug: backup_restore
parent: book_maintenance
index: 10
is_book: false
---

## Overview

hMailServer currently does not include any built-in tools that can be used for backup and restore. However, both MySQL and Microsoft SQL server have tools to create backup.

## What to backup

There are a couple of different things that you should backup.

- The database. The database contains all configuration data and links to the email messages stored on your disk. The easiest way to backup the database is to use mysqldump or, if you're using Microsoft SQL Server, the built-in MS SQL backup tools.
- The data directory. The data directory contains the actual email messages. It contains messages that have not yet been delivered as well as email messages that are stored in IMAP folders. The easiest way to backup the data directory is to use MS-DOS's xcopy.
- Other files. You might want to backup the Events directory (hMailServer version 4.0 onwards), the hMailServer.ini file, the log directory, etc.

## Built-in backup

hMailServer 4.2 and later versions includes built-in backup support. In the backup settings in hMailAdmin, you can define the type of objects that should be backed up.

## Hot backup

It is possible to backup hMailServer while the server is running. However, if you do so, there is a risk that some data will not be backed up. A typical scenario is when you try to backup when hMailServer has only partially received a message. If you want to be sure that everything is backed up, you should stop the server before doing the backup.   
  
`Robocopy` does everything that `xcopy` does, but it can also "synchronize", or mirror, two directories, thereby only copying the difference. That is much faster. You can copy files to a backup directory the usual way, while the hMailServer service is running. At a convenient time later, you stop the service and copy again using `robocopy`. This second copy will be much faster, as it will only copy the changes. This can help minimize downtime. However, beware that `robocopy` can cause disaster if you use it with the wrong switches. Please, read its documentation carefully before using it.
