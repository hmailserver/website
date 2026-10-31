---
title: "Logging object"
slug: com_logging
parent: com_objects
index: 0
is_book: false
---

The Logging object holds the logging settings.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property AWStatsEnabled As Boolean

<div class="indented">AWStats logs should be created by hMailServer.</div>

#### Property Device As eLogDevice

<div class="indented">The logging device. Currently only hLogDeviceFile (2). </div>

#### Property Directory As String

<div class="indented">The hMailServer log directory.</div>

#### Property Enabled As Boolean

<div class="indented">Logging is enabled.</div>

#### Property LiveLog As String

<div class="indented">Returns the current content of the live log and then empties it.</div>

#### Property LogApplication As Boolean

<div class="indented">Application-level events should be logged.</div>

#### Property LogDebug As Boolean

<div class="indented">Debug-level events should be logged.</div>

#### Property LogFormat As eLogOutputFormat

<div class="indented">This property is not used.</div>

#### Property LogIMAP As Boolean

<div class="indented">IMAP-level events should be logged.</div>

#### Property LogPOP3 As Boolean

<div class="indented">POP3-level events should be logged.</div>

#### Property LogSMTP As Boolean

<div class="indented">SMTP-level events should be logged.</div>

#### Property LogTCPIP As Boolean

<div class="indented">TCP/IP-level events should be logged.</div>

# Methods

#### Sub EnableLiveLogging(newVal As Boolean)

<div class="indented">Enable live logging.</div>
