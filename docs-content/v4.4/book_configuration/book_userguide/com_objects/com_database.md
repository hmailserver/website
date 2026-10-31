---
title: "Database object"
slug: com_database
parent: com_objects
index: 0
is_book: false
---

The Database object contains methods and properties that are needed for database access.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property CurrentVersion As Long

<div class="indented">The current hMailServer database. This value is stored in the table <code>hm_dbversion</code></div>

#### Property DatabaseType As eDBtype

<div class="indented">The database server type.</div>

#### Property RequiredVersion As Long

<div class="indented">The database version hMailServer requires to run.</div>

# Methods

#### Sub ExecuteSQL(sSQLStatement As String)

<div class="indented">Executes an SQL statement in the hMailServer database.</div>

#### Function UtilGetFileNameByMessageID(MessageID As Long) As String

<div class="indented">This method returns a value by the given message database ID.</div>

# Sample code

## Display the current database version

`Dim obBaseApp
   Set obBaseApp = CreateObject("hMailServer.Application")
   
   Dim obDatabase
   set obDatabase = obBaseApp.Database
   
   MsgBox "hMailServer database version: " & obDatabase.CurrentVersion`
