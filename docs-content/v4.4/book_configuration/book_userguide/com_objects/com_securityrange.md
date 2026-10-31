---
title: "SecurityRange object"
slug: com_securityrange
parent: com_objects
index: 0
is_book: false
---

The SecurityRange object represents a security range / IP range used by hMailServer.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property AllowDeliveryFromLocalToLocal As Boolean

<div class="indented">Allow deliveries from local to local.</div>

#### Property AllowDeliveryFromLocalToRemote As Boolean

<div class="indented">Allow deliveries from local to remote.</div>

#### Property AllowDeliveryFromRemoteToLocal As Boolean

<div class="indented">Allow deliveries from remote to local.</div>

#### Property AllowDeliveryFromRemoteToRemote As Boolean

<div class="indented">Allow deliveries from remote to remote.</div>

#### Property AllowIMAPConnections As Boolean

<div class="indented">Allow IMAP connections from this IP range.</div>

#### Property AllowPOP3Connections As Boolean

<div class="indented">Allow POP3 connections from this IP range.</div>

#### Property AllowSMTPConnections As Boolean

<div class="indented">Allow SMTP connections from this IP range.</div>

#### Property EnableSpamProtection As Boolean

<div class="indented">Enable spam protection for this IP range.</div>

#### Property ID As Long

<div class="indented">The database identifier for this object.</div>

<div class="indented">
<h4>Property IsForwardingRelay As Boolean</h4>
<div class="indented">Specifies whether the IP range matches the IP address of a forwarding relay (for example a MX backup record).<br></div>
</div>

#### Property LowerIP As String

<div class="indented">The lower IP address.</div>

#### Property Name As String

<div class="indented">The name of this IP range.</div>

#### Property Priority As Long

<div class="indented">The priority of this IP range.</div>

#### Property RequireAuthForDeliveryToLocal As Boolean

<div class="indented">Require SMTP Auth for deliveries to local users.</div>

#### Property RequireAuthForDeliveryToRemote As Boolean

<div class="indented"> Require SMTP Auth for deliveries to remote users.</div>

#### Property UpperIP As String

<div class="indented">The upper IP address.</div>

# Methods

#### Sub Save()

<div class="indented"> Saves the IP address in the database. </div>
