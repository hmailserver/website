---
title: "AntiVirus object"
slug: com_antivirus
parent: com_objects
index: 0
is_book: false
---

The AntiVirus object holds settings for hMailServer anti virus protection.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property Action As eAntivirusAction

<div class="indented">Action to take when a virus is found. </div>

#### Property ClamWinDBFolder As String

<div class="indented">The folder that contains the ClamWin database.</div>

#### Property ClamWinEnabled As Boolean

<div class="indented">ClamWin anti virus protection is enabled.</div>

#### Property CustomScannerEnabled As Boolean

<div class="indented">Custom anti virus scanner is enabled.</div>

#### Property CustomScannerExecutable As String

<div class="indented">The path to the custom anti virus scanner command line executable.</div>

#### Property CustomScannerReturnValue As Long

<div class="indented">The value that the custom anti virus scanner will return if a virus is found.</div>

#### Property NotifyReceiver As Boolean

<div class="indented">hMailServer should notify the recipient of the email message if a virus is found.</div>

#### Property NotifySender As Boolean

<div class="indented">hMailServer should notify the sender of the email message if a virus is found.</div>
