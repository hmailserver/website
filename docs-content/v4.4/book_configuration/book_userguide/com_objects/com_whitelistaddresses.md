---
title: "WhiteListAddresses collection"
slug: com_whitelistaddresses
parent: com_objects
index: 0
is_book: false
---

The WhiteListAddresses collection contains IP addresses and email addresses which won't be effected by spam protection.

# Properties

<div class="api_method_name">Property Count As Long</div>

<div class="indented">
<p>
</p><div class="api_description">The number of objects in the collection.</div>

</div>

<div class="api_method_name">Property Item(Index As Long) As <a href="?page=com_com_whitelistaddress">WhiteListAddress</a></div>

<div class="indented">
<p>
</p><div class="api_description">Returns an object from the collection based on it's index in the collection.</div>

</div>

<div class="api_method_name">Property ItemByDBID(DBID As Long) As <a href="?page=com_whitelistaddress">WhiteListAddress</a></div>

<div class="indented">
<p>
</p><div class="api_description">Returns an object from the collection based on it's database identifier.</div>

</div>

# Methods

<div class="api_method_name">Function Add() As <a href="?page=com_whitelistaddress">WhiteListAddress</a></div>

<div class="indented">
<p>
</p><div class="api_description">Adds a new object to the collection.</div>

</div>

<div class="api_method_name">Sub DeleteByDBID(DBID As Long)</div>

<div class="indented">
<p>
</p><div class="api_description">Deletes the object with the specified database identifier.</div>

</div>

<div class="api_method_name">Sub Refresh()</div>

<div class="indented">
<p>
</p><div class="api_description">Refreshes the collection from the database.</div>

</div>
