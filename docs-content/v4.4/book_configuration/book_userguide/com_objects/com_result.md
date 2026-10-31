---
title: "Result object"
slug: com_result
parent: com_objects
index: 0
is_book: false
---

The Result com objects are used from within hMailServer events, to return value from the event to hMailServer. Instead of returning a value by using *return* or *FunctionName=returnvalue*, you use *Result.Value=returnvalue*

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property Message As String

<div class="indented">
The message to return from the event to hMailServer. This can be used in some events to return a textual message to the client.
</div>

#### Property Value As Long

<div class="indented">
The value to return to hMailServer. Different events supports different return values. See the Events documentation for more information on this.
</div>
