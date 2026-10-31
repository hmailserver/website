---
title: "Upgrading: 4.0 to 4.1"
slug: upgrade_40_to_41
parent: book_upgrading
index: 40
is_book: false
---

## Overview

![](images/scr_installation_small.jpg) This page describes how to upgrade from hMailServer version 4.0 to hMailServer version 4.1. If you follow these steps, the server downtime will only be a few minutes. Before upgrading, you should make sure that you have a backup of the entire hMailServer directory, hMailServer database and hMailServer.ini, in case something goes wrong. The steps below are the same regardless of the database server type that hMailServer is using. Please read through this entire page before you upgrade.

## Install the new version

1. IMPORTANT: Back up your hMailServer database, your data directory and the hMailServer.ini file.
2. Download hMailServer 4.1 from the hMailServer website.
3. Launch the setup executable by doubleclicking it. There is no need to stop or uninstall the previous version before installing 4.1. The hMailServer 4.1 setup will take care of that.
4. Run through the setup dialogs and click Install in the Ready to install dialog.
5. The setup software now makes a copy of the files. If you get a message that it can't overwrite the file libmysql.dll, restart Apache/IIS and then click Retry.
6. After the files have been copied, the setup software will automatically start hMailServer database upgrade.
7. Click Upgrade to upgrade the database to the 4.1 structure.
8. After the upgrade of the database, the setup software will automatically start the hMailServer service.
9. Click Exit to return to the setup wizard
10. Click Finish to exit the setup and start hMailAdmin.

## What's new

### Better support for multihoming

In the hMailAdmin you can configure hMailServer to listen on a specific list of IP addresses, instead of listening on all available addresses, as was previously the case.

### Maximum message size

It's now possible to specify maximum message size at domain and server level. These can be used to prevent users from sending huge messages.

### Caching of domain names

hMailServer can now cache local domain names. If the domain cache is turned on, hMailServer does not have to communicate with the database when it needs domain information, which improves performance.

### Live logging

Live logging now works when using Terminal Services or Remote desktop connection. It also works if the server is remotely administered using DCOM.

### Improved Message interface in COM API

The COM API object, hMailServer.Message, now has several new properties that let you modify or add header fields, or to edit the HTML body of email messages.

### Updated user interface in hMailAdmin

The hMailServer Administrator has been updated with a new structure and new icons.

### Bug fixes

- When hMailServer delivered messages to other servers, sockets could, under certain conditions, be left behind with status CLOSE_WAIT. Now fixed.
- If hMailServer can't connect to the DNS server, that is now treated as a temporary error.
- Recipient addresses are now shown in *Undelivered messages*
- Under certain conditions, the SMTP deliverer could start more delivery threads than it should. Now fixed.
- When using Mail on Apple, only partial attachments were sometimes downloaded. Now fixed.
- The external accounts feature could not download messages from other servers if the message headers were incorrectly formatted. Now fixed.

For a complete list of all changes, read the change log.
