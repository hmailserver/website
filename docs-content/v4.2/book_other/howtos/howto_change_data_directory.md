---
title: "Change the data directory"
slug: howto_change_data_directory
parent: howtos
index: 20
is_book: false
---

## Background

By default, all emails are stored in the hMailServer data directory,
under C:Program FileshMailServerData. In some cases, you might want
to change this to a different path. For example, if you have more disk space
on another drive. Though it is possible to change the path, existing emails will not be moved to the new path. If you move the
existing files from the old Data directory to the new, your email client will not be able to download them.

## Steps

1. Open up hMailServer.ini
2. Locate *DataFolder* under the *Directories*-section
3. Specify the new path

The above instructions are valid for version 2.0 and later. In hMailServer 2.x and 3.x, the
file hMailServer.ini is located in the Windows directory. In later versions, the file
is located in the hMailServer bin directory.
