---
title: "BackupManager object"
slug: com_backupmanager
parent: com_objects
index: 0
is_book: false
---

The BackupManager object contains methods to start and to restore backups.

*The below documentation is valid for hMailServer 4.2 and later*

# Methods

#### Function LoadBackup(sXMLFile As String) As [Backup](?page=com_backup)

<div class="indented">This method loads a backup from file. It returns an object of type Backup. To restore the backup, you need to set the appropriate properties on the backup object and then run <i>StartRestore</i> on it.</div>

#### Sub StartBackup()

<div class="indented">This method starts a backup according to the backup settings.</div>
