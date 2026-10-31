---
title: "Upgrading recommendations"
slug: upgrading_recommendations
parent: book_upgrading
index: 0
is_book: false
---

## Overview

This document gives you a few general recommendations when it comes to upgrading hMailServer from one version to a newer.

## Step 1: Backup everything

Before you upgrade hMailServer, you should back up all your email messages and settings. It's very rare that an upgrade of hMailServer fails, but if it does, you might need to restore a backup of your installation. Remember that if an upgrade fails, all your email may be lost so this is very important that you backup your system before upgrading.

## Step 2: Uninstall old version before installing the new?

Generally, there's no need to uninstall the old hMailServer version before installing the new one. The hMailServer installation program will automatically stop the current hMailServer installation before installing the new version. The recommendation is therefore not to uninstall the existing version before installing the new one. 

The exception to this rule is if you upgrade from hMailServer 3.x to hMailServer 4.x. The hMailServer COM API has a new name in hMailServer 4.x. If you don't uninstall hMailServer 3.x before installing hMailServer 4.x, these old API will still exist on your system. This should never cause any problems. But if you don't want the old API to still be available, you should uninstall hMailServer 3.x before installing hMailServer 4.x. 

Uninstalling hMailServer does not remove any email messages, accounts or other settings. You can uninstall hMailServer and then install it again without losing any messages.

## Step 3: Install the new version

The below steps are the same for most hMailServer version. For version specific informtion, plese see the Upgrading topic in the documentation.

1. Download hMailServer from the hMailServer website.
2. Launch the setup executable by double-clicking it.
3. Run through the setup dialogs and click Install in the Ready to install dialog.
4. The setup software now makes a copy of the files. If you get a message that it can't overwrite the file libmysql.dll, restart Apache/IIS and then click Retry.
5. After the files have been copied, the setup software will automatically start hMailServer database upgrade if needed.
6. If hMailServer database upgrade is started, click Upgrade to upgrade the database to the new database structure.
7. After the upgrade of the database, the setup software will automatically start the hMailServer service.
8. Click Exit to return to the setup wizard
9. Click Finish to exit the setup and start hMailAdmin.
