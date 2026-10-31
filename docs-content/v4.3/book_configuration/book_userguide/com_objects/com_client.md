---
title: "Client object"
slug: com_client
parent: com_objects
index: 0
is_book: false
---

# Version

The below documentation is valid for hMailServer 4.2 and later.

The *Client* object is available in the OnAcceptMessage-event and lets you retrieve information on the current client connection.

# Properties

#### Port

<div class="indented">
The TCP/IP-port that the client is currently connected to.
</div>

#### IPAddress

<div class="indented">
The TCP/IP-address that the client has connected from.
</div>

#### Username

<div class="indented">
The username that the client has logged on using. This is only available if the client has authenticated using SMTP authentication.
</div>
