---
title: "Upgrading: 3.2 to 3.3"
slug: upgrade_32_to_33
parent: book_upgrading
index: 10
is_book: false
---

## Overview

This page describes how to upgrade from hMailServer version 3.2 to hMailServer version 3.3. If you follow these steps, the server downtime will only be a few minutes. Before upgrading, you should make sure that you have a backup of the entire hMailServer directory, in case something goes wrong. The steps below are the same regardless of the database server type that hMailServer is using. Please read through this entire page before you upgrade.

## Install the new version

1. Download hMailServer 3.3 from the hMailServer website.
2. Launch the setup executable by double-clicking on it.
3. There is no need to stop or uninstall the previous version before installing 3.3. The hMailServer 3.3 setup will take care of that.
4. Run through the setup dialogs and click Install in the Ready to install dialog.
5. The setup software now makes a copy of the files.
6. After the files have been copied, the setup software will automatically start the hMailServer database upgrade.
7. Click Upgrade to upgrade the database to the 3.3 structure.
8. After the upgrade of the database, the setup software will automatically start the hMailServer service.
9. Click Exit to return to the setup wizard.
10. Click Finish to exit the setup and to start the hMailServer Administrator.

## After installation

### IP ranges

The IP Ranges functionality in hMailServer has been completely rewritten in version 3.3. The new version includes a number of settings that will make it easier to configure the hMailServer security. Because of this, IP ranges created in 3.2 will automatically be deleted when upgrading to 3.3. The two default IP ranges created in version 3.3 should work for most users.

### Open relay

After an upgrade or reconfiguration, it is important that you run an open relay test, to make sure that no one can use your server to send spam. Click [here](?page=open_relay_tests) for a list of free open relay tests.
