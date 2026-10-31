---
title: "Upgrading: 4.3 to 4.4"
slug: upgrade_43_to_44
parent: book_upgrading
index: 70
is_book: false
---

## Overview

![](images/scr_installation_small.jpg) This page describes how to upgrade from hMailServer version 4.3 to hMailServer version 4.4. If you follow these steps, the server downtime will only be a few minutes. Before upgrading, you should make sure that you have a backup of the entire hMailServer directory, hMailServer database and hMailServer.ini, in case something goes wrong. The steps below are the same regardless of the database server type that hMailServer is using. Please read through this entire page before you upgrade.

## Install the new version

1. IMPORTANT: Back up your hMailServer database, your data directory and the hMailServer.ini file.
2. Download hMailServer 4.4 from the hMailServer website.
3. Launch the setup executable by double-clicking it. There is no need to stop or uninstall the previous version before installing the new version. The hMailServer setup software will take care of that.
4. Run through the setup dialogs and click Install in the Ready to install dialog.
5. The setup software now makes a copy of the files.
6. After the files have been copied, the setup software will automatically start hMailServer database upgrade. If you see the text "*Creating the hMailServer database*" in the installation wizard for more than 15 seconds, and no "*Database upgrade*"-dialog is shown, it's likely that the upgrade dialog is located "behind" the wizard. So if the upgrade dialog is not shown, try moving the installation wizard window.
7. Click Upgrade to upgrade the database to the latest structure.
8. Click Exit to return to the setup wizard
9. Click Finish to exit the setup and start hMailAdmin.

## What's new

For a list over new features and known issues in hMailServer 4.4, [click here.](?page=about_hmailserver_44)
