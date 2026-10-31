---
title: "Route object"
slug: com_route
parent: com_objects
index: 0
is_book: false
---

The Route object represents a hMailServer route.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property Addresses As RouteAddresses

<div class="indented">A collection containing the valid email addreses for this route.</div>

#### Property AllAddresses As Boolean

<div class="indented">hMailServer should route to all addresses.</div>

#### Property DomainName As String

<div class="indented">The route domain name.</div>

#### Property ID As Long

<div class="indented">The database identifier for the route.</div>

#### Property MinutesBetweenTry As Long

<div class="indented">Number of minutes between every try when delivering to the route SMTP server.</div>

#### Property NumberOfTries As Long

<div class="indented">The number of times hMailServer should try to deliver to the route SMTP server.</div>

#### Property RelayerAuthUsername As String

<div class="indented">The username hMailServer should use when delivering messages (if relayer requires SMTP authentication).</div>

#### Property RelayerRequiresAuth As Boolean

<div class="indented">The SMTP server used for the route requires SMTP authentication.</div>

#### Property TargetSMTPHost As String

<div class="indented">The SMTP server hMailServer should deliver to when delivering to this route.</div>

#### Property TargetSMTPPort As Long

<div class="indented">The TCP/IP port on the target SMTP server hMailServer should deliver to when delivering to this route.</div>

#### Property TreatSecurityAsLocalDomain As Boolean

<div class="indented">hMailServer should treat this route as a local domain when checking security against IP ranges.</div>

# Methods

#### Sub Save()

<div class="indented">Saves the route in the database.</div>

#### Sub SetRelayerAuthPassword(newVal As String)

<div class="indented">Sets the password in the database.</div>
