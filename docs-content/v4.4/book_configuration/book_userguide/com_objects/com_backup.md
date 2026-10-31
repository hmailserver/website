---
title: "Backup object"
slug: com_backup
parent: com_objects
index: 0
is_book: false
---

The backup object contains information regarding a backup made by hMailServer.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property ContainsDomains As Boolean

<div class="indented">True if the backup contain domains.</div>

#### Property ContainsMessages As Boolean

<div class="indented">True if the backup contain messages.</div>

#### Property ContainsSettings As Boolean

<div class="indented">True if the backup contain settings.</div>

#### Property DeleteObjectsNotInBackup As Boolean

<div class="indented">If this property is set to true, hMailServer will delete objects that does not exist in the backup when restoring.</div>

#### Property OverwriteObjects As Boolean

<div class="indented">If this property is set to true, hMailServer will overwrite objects in the installation that exists in the backup file, when restoring.</div>

#### Property RestoreDomains As Boolean

<div class="indented">Set this property to true if you want hMailServer to restore domains in the backup when running the restore</div>

#### Property RestoreMessages As Boolean

<div class="indented">Set this property to true if you want hMailServer to restore messages in the backup when running the restore</div>

#### Property RestoreSettings As Booleann

<div class="indented">Set this property to true if you want hMailServer to restore settings from the backup when running the restore</div>

# Methods

#### Sub StartRestore()

<div class="indented">This option restores the backup. This is done asynchronously - the method returns immediately. Restore result can be found in the hMailServer backup/restore-log.</div>
