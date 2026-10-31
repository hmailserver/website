---
title: "Upgrading: 4.x to 5.0"
slug: upgrade_4x_to_50
parent: book_upgrading
index: 40
is_book: false
---

## Overview

This page describes how to upgrade from hMailServer version 4.x to hMailServer 5. If you follow these steps, the server downtime will only be a few minutes. Before upgrading, you should make sure that you have a backup of the entire hMailServer directory, hMailServer database and hMailServer.ini, in case something goes wrong. The steps below are the same regardless of the database server type that hMailServer is using. Please read through this entire page before you upgrade.

### Before installation

- Note that the system requirements for version 5 is not the same as for version 4. For example, if you are using Microsoft SQL Server, Microsoft SQL Server 2005 is now a requirement.
- If you are using the internal MySQL database, and are upgrading from 4.2 or earlier, you should install the latest 4.4-build prior to upgrading to version 5. If you do not do this, the database upgrad will fail.

### Install the new version

1. IMPORTANT: Back up your hMailServer database, your data directory and the hMailServer.ini file.
2. Read the Backwards compatibility section below. If something is unclear, it's recommended that you install hMailServer 5 on a test server first to learn about the new functionality.
3. Download hMailServer 5 from the hMailServer website.
4. Launch the setup executable by double-clicking it. You should not stop or uninstall the current version before instaling the new version.
5. Run through the setup dialogs and click Install in the Ready to install dialog.
6. The setup software now makes a copy of the files.
   - If you get a message that it can't overwrite the file libmysql.dll, restart Apache/IIS and then click Retry.
  - If you get a message that mysqld.exe can't be overwritten, manually delete this file using the Windows Explorer, then click Retry to proceed.
7. After the files have been copied, the setup software will automatically start hMailServer database upgrade. If you see the text "*Creating the hMailServer database*" in the installation wizard for more than 15 seconds, and no "*Database upgrade*"-dialog is shown, it's likely that the upgrade dialog is located "behind" the wizard. So if the upgrade dialog is not shown, try moving the installation wizard window.
8. Click Upgrade to upgrade the database to the latest structure.
9. Click Exit to return to the setup wizard
10. Click Finish to exit the setup and start hMailAdmin.

### What's new

For a list over new features and known issues in hMailServer 5, [click here.](?page=about_hmailserver_5)

### Backwards compatibility

hMailServer 5 includes a lot of changes. Some of these changes modify the behavior of existing functionality. The following functionality have been redesigned in hMailServer 5. After upgrade, please review this configuration to make sure it fits your needs.

- **New default database engine**  

     

 In hMailServer 4, the internal database engine was MySQL. hMailServer 5 uses Microsoft SQL Server 2008 Compact Edition instead. This will not have any effect on upgrades - if you have installed hMailServer 4 with the internal MySQL database and you upgrade to version 5, your hMailServer installation will continue using MySQL.   

  
- **TCP/IP port configuration changes**  

   

 In hMailServer 4, it was possible to configure what IP addresses hMailServer should listen on, and which TCP/IP ports hMailServer should listen on. There was no link between these two settings and they were made independently of each other. In version 5, these two settings are now one, which means that it's now possible to specify exactly which ports hMailServer should listen on for different IP addresses. For example, on 127.0.0.1 hMailServer can listen on port 25 and on 192.168.0.1 it can listen on TCP/IP port 26. If you have not modified the default multi-homing or TCP/IP port settings in hMailServer 4, this change won't affect you.  

  
- **COM API** changes  

     

 A [lot of changes](?page=com_changelog) have been made in the COM API.  

  
- **Password hashing algorithm**  

   

 In version 4, hMailServer stored account passwords as MD5 hashes in the database. MD5 is no longer considered to be sure so in hMailServer 5 an algorithm named SHA256 is used instead. If you have custom-built software which accesses the hMailServer database and assumes that account passwords are MD5 hashes, you either need to update this software, or you need to [configure hMailServer to continue using MD5](?page=reference_inifilesettings) using the *PreferredHashAlgorithm* setting.

 
