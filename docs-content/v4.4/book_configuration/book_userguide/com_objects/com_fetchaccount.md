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

<div class="indented"> The database identifier for the account that this external account is connected to.  </div>

#### Property DaysToKeepMessages As Long

<div class="indented"> The number of days hMailServer should leave messages on the external server before deleting it.</div>

#### Property Enabled As Boolean

<div class="indented"> If the external account is active, true is returned. Otherwise false. </div>

#### Property ID As Long

<div class="indented"> The database identifier for this external account.</div>

#### Property MinutesBetweenFetch As Long

<div class="indented"> The number of minutes between hMailServer checks the external account for new messages. It's not recommended that you set this value to lower than 30 (minutes).</div>

#### Property Name As String

<div class="indented"> The name of this external account. Can be anything (but should not be empty).</div>

#### Property Password As String

<div class="indented"> The password hMailServer should use when logging on the external POP3 account</div>

#### Property Port As Long

<div class="indented"> The port number on the external POP3 server hMailServer should connect to. Normally 110.</div>

#### Property ProcessMIMEDate As Boolean

<div class="indented">Process receive date in Received header. If this option is enabled, hMailServer will set the internal date of the message to the date in the latest Received-header, instead of using the current date.<br></div>

#### Property ProcessMIMERecipients As Boolean

<div class="indented">If this option is selected, hMailServer will forward the message to the recipients in the MIME headers instead of sending it to the account which this external account belongs to.<br></div>

#### Property ServerAddress As String

<div class="indented"> The host name of the external POP3 server.  </div>

#### Property ServerType As Long

<div class="indented"> The type of external server. Currently only 0 (POP3). </div>

#### Property Username As String

<div class="indented"> The username hMailServer should use when logging on the external POP3 account</div>

# Methods

#### Sub DownloadNow()

<div class="indented">This method triggers a download of messages from the external account. This is done internally by changing the "Next download time" to now, and then telling the ExternalFetchManager that messages should be downloaded. This has the effect that messages will be downloaded as soon as possible. If a download from this account is already ongoing, this command won't have any effect. If the maximum number of simultaneous downloads are already ongoing, the download for this external account will be scheduled until one of these downloads have been completed.<br> </div>

#### Sub Save()

<div class="indented"> Saves the external account / fetch account in the database. If the object already exists, it's updated. </div>
