---
title: "OnAcceptMessage"
slug: feature_scripting_onacceptmessage
parent: feature_scripting
index: 0
is_book: false
---

## Signature

OnAcceptMessage(oClient as hMailServer.Client, oMessage as hMailServer.Message)

## Result values

- 0 - hMailServer accepts the message
- 1 - hMailServer rejects the message with the error *542 Rejected*
- 2 - hMailServer rejects the message with a script-defined error.

## Examples

VB-script:

<pre>
Sub OnAcceptMessage(oClient, oMessage)
  
  If oMessage.Size &gt; 10 Then
     ' Reject the message since it's larger
     ' than 10 kb.
     Result.Message = "This message is too large"
     Result.Value = 2            
  Else
     ' Accept the message
     Result.Value = 0 
  End If
  
End Sub
</pre>
