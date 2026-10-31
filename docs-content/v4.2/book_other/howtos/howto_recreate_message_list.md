---
title: "Recreating messages lists in the database"
slug: howto_recreate_message_list
parent: howtos
index: 0
is_book: false
---

## Background

hMailServer e-mail messages are stored in the hMailServer data directory (normally *C:\Program Files\hMailServer\Data*). The database contains lists of these messages. For example, the path to the message file, the size of the message, message flags and recipients of the message is stored in the database.

When you download messages from hMailServer using POP3 or IMAP, hMailServer loads a list of messages from the database to determine whether email exists for your account. So if the email file exists on the disk in the data directory but not in the database, you will not be able to download the message.

Normally, you should **not** have to recreate message lists. Do not try to recreate message lists unless you are certain that you need to do. If you are a unsure, feel free to ask in the user forum.

## Recreating message lists in database

Using the tool [DataDirectorySynchronizer](http://dev.hmailserver.com/tools/DataDirectorySynchronizer.exe), you can recreate the message list in the database. **Note:** This tool requires hMailServer 4.0 build 119 or later.

Follow these steps to recreate message lists in the database:

1. Backup your hMailServer system (database and data directory). Since DataDirectorySynchronizer makes large changes to your hMailServer database, this is very important.
2. Download *DataDirectorySynchronizer.exe*
3. Copy the executable to the hMailServver Bin directory.
4. Double-click on *DataDirectorySynchronizer.exe* to run it.
5. Click *Next* to start synchronization

The speed of the synchronization varies depending on computer hardware. On a Intel P4 2.4Ghz, you can estimate about 50 messages per second will be imported.

## Important notes

- The tool must be copied to the hMailServer bin directory before it's run.
- When running this tool, the server is automatically stopped. So during import, you will not be able to connect to the server.
- Since IMAP message data, such as folder information, message flags etc are stored in the database and not in the message files, that information will not be recreated when recreate the message list. Hence, when messages are inserted into the database, all messages will end up in the inbox folder and marked as unread.
- Files located in the root data folder will be delivered to the recipients in the To and CC headers.
- Files located in data folder sub directories, such as domain\username will be connected to that user in the database.
- Only files with the extension .eml or .hma are imported into the database
- Files imported directly to user accounts won't be treated by filters, rules, virus scanning features in hMailServer
