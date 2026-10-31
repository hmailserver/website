---
title: "DistributionList object"
slug: com_distributionlist
parent: com_objects
index: 0
is_book: false
---

The DistributionList object contains the settings for a hMailServer distribution list.

# Version

The below documentation is valid for hMailServer 4.1 and later.

# Properties

#### Property Active As Boolean

<div class="indented">The distribution list is active.</div>

#### Property Address As String

<div class="indented">The address of the distribution list.</div>

#### Property Recipients As [DistributionListRecipients](?page=com_distributionlistrecipients)

<div class="indented">A collection containing the recipients of the distribution list.</div>

#### Property RequireSenderAddress As String

<div class="indented">The distribution list only allows messages from this address.</div>

#### Property ID As Long

<div class="indented">The database identifier for the distribution list.</div>

#### Property RequireSMTPAuth As Boolean

<div class="indented">hMailServer should require SMTP authentication when messages are delivered to the distribution list.</div>

# Methods

#### Sub Delete()

<div class="indented">Deletes the distribution list.</div>

#### Sub Save()

<div class="indented">Saves the distribution list.</div>
