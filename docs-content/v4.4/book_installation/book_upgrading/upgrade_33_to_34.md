---
title: "Upgrading: 3.3 to 3.4"
slug: upgrade_33_to_34
parent: book_upgrading
index: 20
is_book: false
---

## Overview

This page describes how to upgrade from hMailServer version 3.3 to hMailServer version 3.4. If you follow these steps, the server downtime will only be a few minutes. Before upgrading, you should make sure that you have a backup of the entire hMailServer directory, in case something goes wrong. The steps below are the same regardless of the database server type that hMailServer is using. Please read through this entire page before you upgrade.

## Install the new version

1. IMPORTANT: Back up your database, your data directory and the hMailServer.ini file.
2. Download hMailServer 3.4 from the hMailServer website.
3. Launch the setup executable by double-clicking on it.
4. There is no need to stop or uninstall version 3.3 before installing version 3.4. The hMailServer 3.4 setup will take care of that.
5. Run through the setup dialogs and click Install in the Ready to install dialog.
6. The setup software now makes a copy of the files.
7. After the files have been copied, the setup software will automatically start the hMailServer database upgrade.
8. Click Upgrade to upgrade the database to the 3.4 structure.
9. After the upgrade of the database, the setup software will automatically start the hMailServer service.
10. Click Exit to return to the setup wizard
11. Click Finish to exit the setup and start hMailAdmin.

## What's new

### Custom DNS black lists

In 3.4, you can define your own DNS black lists. If you used any black lists in the previous version, you will need to re-enable them after the upgrade.

### SPF support

hMailServer now supports the [Sender Policy Framework(SPF)](http://spf.pobox.com/). This is used to reduce the amount of spam, by letting domain owners specify a list of hosts that are allowed to send email from their domain. When hMailServer receives an email, it will check that the sender is authorized to send email from the specific domain.

### MX check

hMailServer can now check that the domain name in the sender's email address has MX records. Spammers sometimes send email from non-existent domains. If you configure hMailServer to check the MX records, hMailServer will reject email from such senders. Note that not all domains have valid MX records, so there is a risk that legitimate email would be dropped.

### Encrypted passwords

In 3.4, passwords in the database and in .INI files are encrypted. The passwords in the database are encrypted using MD5. MD5 is a non-reversible type of encryption; even if someone gets access to your database files and can read the MD5-password, they can't use it for anything. Passwords in hMailServer.ini are encrypted using Blowfish. Please note that the password used for the Blowfish encryption isn't secret. Hence the database password in hMailServer.ini isn't really encrypted but encoded. The reason for this is to make it a little bit harder to see the database password when using MySQL. 

If you upgrade from an earlier version, existing passwords won't be automatically encrypted. To encrypt the password in hMailServer.ini, run hMailServer Database Setup and chose to select a new default database. Then select the old one. To encrypt the passwords in the database, run Program FileshMailServerAddonsUtilitiesEncryptAllPasswords.vbs

### External virus scanners

It is possible to define an external virus scanner in the AntiVirus settings. To do this, you need to specify the path to the scanner's executable and the return value it gives when it detects a virus. If you wish to use a command line virus scanner but you don't know what return values to enter, post a message in the hMailServer forum and we should be able to help you.

### Delivery log

In 3.4, you can turn on the delivery log in the advanced SMTP settings. If you do this, messages delivered by the server will be logged to the hm_deliverylog and hm_deliverylogrecipients table in the hMailServer database. Please note that the server software will never empty these tables. So, if you turn on this feature, it's your responsibility to write a script to purge the tables before they become too large.

### MySQL 4.1 support

The server now works directly with MySQL 4.1. A new version of libmysql.dll is distributed together with hMailServer.
