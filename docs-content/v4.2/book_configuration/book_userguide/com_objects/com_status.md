---
title: "Status object"
slug: com_status
parent: com_objects
index: 0
is_book: false
---

The hMailServer.Status object contains the current status of your hMailServer installation. For example, it's possible to extract a list of all undelivered messages, and the number of detected viruses.

# Version

The below documentation is valid for hMailServer 4.1 and later.

# Properties

#### Property ProcessedMessages As Long

<div class="indented">The number of delivered messages.</div>

#### Property RemovedSpamMessages As Long

<div class="indented">The number of detected spam messages.</div>

#### Property RemovedViruses As Long

<div class="indented">The number of removed virues.</div>

#### Property StartTime As String

<div class="indented">The server start time.</div>

#### Property UndeliveredMessages As String

<div class="indented">A list of all messages in the delivery queue</div>
