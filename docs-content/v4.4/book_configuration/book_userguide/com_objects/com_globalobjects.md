---
title: "GlobalObjects object"
slug: com_globalobjects
parent: com_objects
index: 0
is_book: false
---

The GlobalObjects object contains objects that are global to the entire hMailServer installation and needs to be accessible using the COM API.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property DeliveryQueue As [DeliveryQueue](?page=com_deliveryqueue)

<div class="indented">The hMailServer delivery queue. Contains properties to clear the queue etc.</div>

#### Property Language(sLanguage As String) As [Language](?page=com_language)

<div class="indented">The language object. Used to retrieve translated for the user interface.</div>
