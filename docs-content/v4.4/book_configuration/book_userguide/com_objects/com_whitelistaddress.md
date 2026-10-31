---
title: "WhiteListAddress object"
slug: com_whitelistaddress
parent: com_objects
index: 0
is_book: false
---

The WhiteListAddress object holds an IP address range and / or email address which should be excluded from spam protection.

# Properties

<p><span class="api_method_name">Property Description As String</span></p>

<div class="indented">
<p><span class="api_description">A textual description of the record.</span></p>
</div>

<p><span class="api_method_name">Property EMailAddress As Long</span></p>

<div class="indented">
<p><span class="api_description">The email address which should be excluded from spam protection (wildcards allowed).</span></p>
</div>

<p><span class="api_method_name">Property ID As Long</span></p>

<div class="indented">
<p><span class="api_description">The unique database identifier for the object.</span></p>
</div>

<p><span class="api_method_name">Property LowerIPAddress As String</span></p>

<div class="indented">
<p><span class="api_description">The lower bound of the IP range which should be excluded from spam protection.</span></p>
</div>

<p><span class="api_method_name">Property UpperIPAddress As String</span></p>

<div class="indented">
<p><span class="api_description">The upper bound of the IP range which should be excluded from spam protection.</span></p>
</div>

# Methods

<p><span class="api_method_name">Sub Save()</span></p>

<div class="indented">
<p><span class="api_description"> Saves the object in the database.</span> </p>
</div>
