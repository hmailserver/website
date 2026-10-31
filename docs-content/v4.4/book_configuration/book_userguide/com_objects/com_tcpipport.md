---
title: "TCPIPPort object"
slug: com_tcpipport
parent: com_objects
index: 0
is_book: false
---

The TCPIPPort object represents a TCP/IP port hMailServer should listen for incoming traffic on.

# Properties

#### Property ID As Long

<div class="indented">The unique database identifier for the object.</div>

#### Property PortNumber As String

<div class="indented">The TCP/IP port number.</div>

#### Property Protocol As eSessionType

<div class="indented">The type of the session. Can be eSTSMTP = 1, eSTPOP3 = 3, eSTIMAP = 5</div>

# Methods

#### Sub Save()

<div class="indented">
Saves the object in the database.
</div>
