---
title: "DeliveryQueue object"
slug: com_deliveryqueue
parent: com_objects
index: 0
is_book: false
---

The DeliveryQueue object contains methods used to access the delivery queue.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Methods

#### Sub Clear()

<div class="indented">Clears the delivery queue. Removes all the messages from the database and from the data folder.</div>

#### Sub ResetDeliveryTime(iMessageID As Long)

<div class="indented">Resets the delivery time for the message ID. This will cause hMailServer to deliver the message.</div>

#### Sub StartDelivery()

<div class="indented">Forces the deliverer to look for messages to deliver.</div>
