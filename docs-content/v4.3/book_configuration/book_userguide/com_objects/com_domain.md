---
title: "Domain object"
slug: com_domain
parent: com_objects
index: 0
is_book: false
---

*The below documentation is valid for hMailServer 4.x and later*

# Properties

#### Property Accounts As [Accounts](?page=com_accounts)

<div class="indented">
Returns a collection containing the <a href="?page=com_accounts">accounts</a> connected to this domain.
</div>

#### Property Active As Boolean

<div class="indented">
Returns true if the domain is active. False otherwise.
</div>

#### Property ADDomainName As String

<div class="indented">
The active directory domain this domain will be synchronised to.
</div>

#### Property Aliases As [Aliases](?page=com_aliases)

<div class="indented">
Returns a collection containing the aliases connected to this domain.
</div>

#### Property DistributionLists As [DistributionLists](?page=com_distributionlists)

<div class="indented">
Returns a collection containing the distribution lists connected to this domain.
</div>

#### Property DomainAliases As [DomainAliases](?page=com_domainaliases)

<div class="indented">
Returns the domain aliases for this domain.
</div>

#### Property ID As Long

<div class="indented">
The unique database identifier for the domain.
</div>

#### Property Name As String

<div class="indented">The name of this domain.</div>

#### Property Postmaster As String

<div class="indented">The post master address for this domain. Also called catch-all address.</div>

# Methods

#### Sub Delete()

<div class="indented">Deletes the domain from the database</div>

#### Sub Save()

<div class="indented">Saves the domain in the database.</div>

#### Sub SynchronizeDirectory()

<div class="indented">Synchronizes this domain towards active directory.</div>
