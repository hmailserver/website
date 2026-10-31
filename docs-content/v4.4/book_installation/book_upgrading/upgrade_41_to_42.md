---
title: "Upgrading: 4.1 to 4.2"
slug: upgrade_41_to_42
parent: book_upgrading
index: 50
is_book: false
---

## Overview

![](images/scr_installation_small.jpg) This page describes how to upgrade from hMailServer version 4.1 to hMailServer version 4.2. If you follow these steps, the server downtime will only be a few minutes. Before upgrading, you should make sure that you have a backup of the entire hMailServer directory, hMailServer database and hMailServer.ini, in case something goes wrong. The steps below are the same regardless of the database server type that hMailServer is using. Please read through this entire page before you upgrade.

## Install the new version

1. IMPORTANT: Back up your hMailServer database, your data directory and the hMailServer.ini file.
2. Download hMailServer 4.2 from the hMailServer website.
3. Launch the setup executable by double-clicking it. There is no need to stop or uninstall the previous version before installing 4.2. The hMailServer 4.2 setup will take care of that.
4. Run through the setup dialogs and click Install in the Ready to install dialog.
5. The setup software now makes a copy of the files. If you get a message that it can't overwrite the file libmysql.dll, restart Apache/IIS and then click Retry.
6. After the files have been copied, the setup software will automatically start hMailServer database upgrade.
7. Click Upgrade to upgrade the database to the 4.2 structure.
8. After the upgrade of the database, the setup software will automatically start the hMailServer service.
9. Click Exit to return to the setup wizard
10. Click Finish to exit the setup and start hMailAdmin.

## What's new

For a list over new features in hMailServer 4.2, [click here.](?page=whats_new_42)

## Known issues

The following issues are currently open and under investigation.

### Pocket Outlook and Base64

Messages where the entire text/html-parts are Base64 encoded are not displayed correctly when using Pocket Outlook 2003. It has not yet been fully confirmed that this is a hMailServer defect. If it is, it has most likely existed in earlier versions as well. Fully base64-encoded text/html parts of messages are rare.

### External accounts

One user has reported that hMailServer occasionally downloads the same messages several times from external accounts.
