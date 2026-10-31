---
title: "Backup"
slug: feature_backup
parent: book_userguide
index: 0
is_book: false
---

hMailServer backups are made by the hMailServer service. When you choose to start a backup in hMailServer Administrator, hMailServer Administrator connects to the hMailServer service using the COM API, and tells the hMailServer service to start a backup. Because of this, the hMailServer service must be running when a backup is being made.

The built-in backup functionality is designed for small installations. If you have more than 50 accounts or 10 000 messages on the server, we **strongly recommend** that you use external tools to perform the backup.

## Backup to network drives

For a backup to be successful, the hMailServer service must have permission to write to the path you have specified as backup destination. 

If the backup destination is a network drive, you must ensure that the hMailServer service has permissions to write to this drive. Normally, you will have to change the Log-on account for the hMailServer service before backing up to a network drive. This is done in the service settings in the Windows control panel 

For more information, see

- [Backup settings (reference guide)](?page=reference_backup)
- [Backup recommendations](?page=backup_restore)
