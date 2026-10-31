---
title: "Domains collection"
slug: com_domains
parent: com_objects
index: 0
is_book: false
---

The *Domains* collection contains zero or more domains.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

<div class="api_method_name">Property Count As Long</div>

<div class="indented">
<p>
</p><div class="api_description"> The number of domains in this collection.</div>

</div>

<div class="api_method_name">Property Item(Index As Long) As <a href="?page=com_domain">Domain<br></a>Property ItemByDBID(DBID As Long) As <a href="?page=com_domain">Domain<br></a>Function ItemByName(ItemName As String) As <a href="?page=com_domain">Domain</a></div>

<div class="indented">
<p>
</p><div class="api_description"> Returns the domain by it's given Index, database identifier or name. If the <a href="?page=com_domain">domain</a> does not exist, an exception is thrown.</div>

</div>

# Methods

<div class="api_method_name">Function Add() As <a href="?page=com_domain">Domain</a></div>

<div class="indented">
<p>
</p><div class="api_description"> Creates and returns a new <a href="?page=com_domain">domain</a>. Call Save() on the returned domain to add it to the collection.</div>

</div>

<div class="api_method_name">Sub Refresh()</div>

<div class="indented">
<p>
</p><div class="api_description"> Refreshes the collection from the database.</div>

</div>
