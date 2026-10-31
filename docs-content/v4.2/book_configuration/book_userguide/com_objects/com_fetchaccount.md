---
title: "FetchAccount object"
slug: com_fetchaccount
parent: com_objects
index: 0
is_book: false
---

FetchAccount is same as *External account* and is the feature used to download messages from external servers.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property AccountID As Long

<div class="indented">
The database identifier for the account that this external account is connected to. 
</div>

#### Property DaysToKeepMessages As Long

<div class="indented">
The number of days hMailServer should leave messages on the external server before deleting it.</div>

#### Property Enabled As Boolean

<div class="indented">
If the external account is active, true is returned. Otherwise false.
</div>

#### Property ID As Long

<div class="indented">
The database identifier for this external account.</div>

#### Property MinutesBetweenFetch As Long

<div class="indented">
The number of minutes between hMailServer checks the external account for new messages. It's not recommended that you set this value to lower than 30 (minutes).</div>

#### Property Name As String

<div class="indented">
The name of this external account. Can be anything (but should not be empty).</div>

#### Property Password As String

<div class="indented">
The password hMailServer should use when logging on the external POP3 account</div>

#### Property Port As Long

<div class="indented">
The port number on the external POP3 server hMailServer should connect to. Normally 110.</div>

#### Property ServerAddress As String

<div class="indented">
The host name of the external POP3 server. 
</div>

#### Property ServerType As Long

<div class="indented">
The type of external server. Currently only 0 (POP3).
</div>

#### Property Username As String

<div class="indented">
The username hMailServer should use when logging on the external POP3 account</div>

# Methods

#### Sub Save()

<div class="indented">
Saves the external account / fetch account in the database. If the object already exists, it's updated.
</div>
