---
title: "OnDeliverMessage"
slug: scripting_ondelivermessage
parent: reference_scripts
index: 0
is_book: false
---

## Signature

OnDeliverMessage(oMessage as hMailServer.Message)

## Result values

- 0 - Deliver the message
- 1 - Do not deliver the message

## Examples

<p>VB-script:<br>
<pre>Sub OnDeliverMessage(oMessage)      
If oMessage.Size &gt; 1000000 Then
      ' This message is to big. We should not      
      ' deliver it.      
      Result.Value = 1                 
Else      
      ' Accept the message      
      Result.Value = 0    
End If    
End Sub 
</pre></p>
