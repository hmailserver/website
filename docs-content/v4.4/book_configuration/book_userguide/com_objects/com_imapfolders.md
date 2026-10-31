---
title: "IMAPFolders collection"
slug: com_imapfolders
parent: com_objects
index: 0
is_book: false
---

The *IMAPFolders* collection contains zero or more IMAP folders.

## Version

The below documentation is valid for hMailServer 4.2 and later.

## Properties

#### Property Count As Long

<div class="indented"> The number of IMAP folders in this collection.  </div>

#### Property Item(Index As Long) As [IMAPFolder](?page=com_imapfolder)

#### Property ItemByDBID(DBID As Long) As [IMAPFolder](?page=com_imapfolder)

#### Property ItemByName(Name As String) As [IMAPFolder](?page=com_imapfolder)

<div class="indented"> Returns the <a href="?page=com_imapfolder">imap folder</a> by it's given Index, database identifier or name. If the IMAP folder does not exist, an exception is thrown. </div>

## Methods

#### Function Add(sName As String) As IMAPFolder

Adds an IMAP folder with the given name to the collection. It is saved immediately.

#### Sub DeleteByDBID(lDBID As Long)

Deletes an IMAP folder with the given database identifier.
