---
title: "Change the data directory"
slug: howto_change_data_directory
parent: howtos
index: 20
is_book: false
---

## Background

By default, all emails are stored in the hMailServer data directory, under C:\Program Files\hMailServer\Data. In some cases, you might want to change this to a different path. For example, if you have more disk space on another drive. Though it is possible to change the path, existing emails will not be moved to the new path. If you move the existing files from the old Data directory to the new, your email client will not be able to download them.

## Steps

1. Open up hMailServer.ini
2. Locate *DataFolder* under the *Directories*-section
3. Specify the new path

## Notes

- If you want to move your existing email message files, you must connect to the database server and update the hm_messages table manually.
