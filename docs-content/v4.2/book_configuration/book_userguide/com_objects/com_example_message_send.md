---
title: "Sending a message"
slug: com_example_message_send
parent: com_objects
index: 0
is_book: false
---

It is possible to send an email using the hMailServer COM library. Please note that the functions for this are very basic. If you want to be able to send complex messages, for example messages with both HTML and plain/text part, or messages containing attachments, hMailServer does not offer enough functionality.

# Version

The below documentation is valid for hMailServer 4.2 and later.

<pre>
dim oMessage
Set oMessage = CreateObject("hMailServer.Message")

oMessage.From = "Me <myaddress>"
oMessage.FromAddress = "myaddress@mydomain.com"
oMessage.Subject = "Hi"
oMessage.AddRecipient "My friend", "myfriend@myfriend.com"
oMessage.Body = "This is the contents of the email."
oMessage.Save
</myaddress></pre>
