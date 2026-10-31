---
title: "Upgrading: 4.2 to 4.3"
slug: upgrade_42_to_43
parent: book_upgrading
index: 60
is_book: false
---

## Overview

![](images/scr_installation_small.jpg) This page describes how to upgrade from hMailServer version 4.2 to hMailServer version 4.3. If you follow these steps, the server downtime will only be a few minutes. Before upgrading, you should make sure that you have a backup of the entire hMailServer directory, hMailServer database and hMailServer.ini, in case something goes wrong. The steps below are the same regardless of the database server type that hMailServer is using. Please read through this entire page before you upgrade.

## Install the new version

1. IMPORTANT: Back up your hMailServer database, your data directory and the hMailServer.ini file.
2. Download hMailServer 4.3 from the hMailServer website.
3. Launch the setup executable by double-clicking it. There is no need to stop or uninstall the previous version before installing 4.3. The hMailServer 4.3 setup will take care of that.
4. Run through the setup dialogs and click Install in the Ready to install dialog.
5. The setup software now makes a copy of the files. If you get a message that it can't overwrite the file libmysql.dll, restart Apache/IIS and then click Retry.
6. After the files have been copied, the setup software will automatically start hMailServer database upgrade. If you see the text "*Creating the hMailServer database*" in the installation wizard for more than 15 seconds, and no "*Database upgrade*"-dialog is shown, it's likely that the upgrade dialog is located "behind" the wizard. So if the upgrade dialog is not shown, try moving the installation wizard window.
7. Click Upgrade to upgrade the database to the 4.3 structure.
8. After the upgrade of the database, you need to specify a main administration password for your hMailServer installation. This password will be needed when managing your hMailServer installation later.
9. Click Exit to return to the setup wizard
10. Click Finish to exit the setup and start hMailAdmin.

## What's new

For a list over new features in hMailServer 4.3, [click here.](?page=whats_new_43)

## Known issues

The following issues are currently open and under investigation:

hMailServer currently does not have full unicode support. While it's possible to send email containing characters with Unicode encoding, it's not possible to specify non-ANSII characters in any of the settings. This means that you cannot specify for example greek characters in the auto-reply settings. This issue will be resolved in the next version.  
  
When adding a signature to an email message, the signature is appended to the email body as clear text regarding of body encoding. This means that the signature will not be encoded properly if the original email body is encoded, for example using base64. The reason for this is the lack of Unicode support mentioned above.  
  
These limitations have existed in all previous hMailServer version as well. They will be resolved in the next version.
