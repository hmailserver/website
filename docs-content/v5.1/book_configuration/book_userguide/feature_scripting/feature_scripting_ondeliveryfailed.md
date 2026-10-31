---
title: "OnDeliveryFailed"
slug: feature_scripting_ondeliveryfailed
parent: feature_scripting
index: 0
is_book: false
---

## Overview

This event is executed if delivery to a recipient fails. If a message to multiple recipients cannot be sent, the event is executed once for every recipient.

## Signature

OnDeliveryFailed(oMessage, sRecipient, sErrorMessage)

## Parameters

- oMessage - The message which has not been delivered.
- sRecipient - The recipient which the message has not been delivered to
- sErrorMessage - The error which caused the delivery failure

## Result values

- None
