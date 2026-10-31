---
title: "AntiSpam object"
slug: com_antispam
parent: com_objects
index: 0
is_book: false
---

The hMailServer.AntiSpam object contains settings that relates to the hMailServer spam protection.

# Properties

#### Property AddHeaderReason As Boolean

<div class="indented">Add header X-hMailServer-Reason when spam message is found.</div>

#### Property AddHeaderSpam As Boolean

<div class="indented">Add header X-hMailServer-Spam when spam message is found.</div>

#### Property Backup As [BackupSettings](?page=com_backupsettings)

<div class="indented">Returns an object of type Backup that contains the backup settings.</div>

#### Property AntiSpamAction As eAntiSpamAction

<div class="indented">The action to take when a message has been detected as spam.</div>

#### Property CheckHostInHelo As Boolean

<div class="indented">Check host specified in HELO command.</div>

#### Property GreyListingEnabled As Boolean

<div class="indented">Enables and disables grey listing</div>

#### Property GreyListingFinalDelete As Long

<div class="indented">GreyListing - Delete used triplet after this time (hours).</div>

#### Property GreyListingInitialDelay As Long

<div class="indented">GreyListing - Delay before accepting messages (minutes).</div>

#### Property GreyListingInitialDelete As Long

<div class="indented">GreyListing - Delete unused triplet after this time (hours).</div>

#### Property GreyListingWhiteAddresses As GreyListingWhiteAddresses

<div class="indented">Collection of IP addresses excluded from grey listing.</div>

#### Property PrependSubject As Boolean

<div class="indented">Prepend message subject on spam messages.</div>

#### Property PrependSubjectText As String

<div class="indented">Text to prepend to message subject.</div>

#### Property SURBLServers As SURBLServers

<div class="indented">Collection of SURBL servers.</div>

#### Property WhiteListAddresses As WhiteListAddresses

<div class="indented">Collection of whitelisted IP and email addresses.</div>
