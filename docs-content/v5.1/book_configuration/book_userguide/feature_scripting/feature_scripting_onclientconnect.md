---
title: "OnClientConnect"
slug: feature_scripting_onclientconnect
parent: feature_scripting
index: 0
is_book: false
---

## Signature

OnClientConnect(oClient as hMailServer.Client)

## Result values

- 0 - hMailServer accepts the connection
- 1 - hMailServer rejects the connection

## Examples

VB-script:

<pre>
Sub OnClientConnect(oClient)
  Result.Value = 0
  If oClient.Port = 25 Then
     If StrComp("127.0.0.0", "127.0.0.1") Then
        ' We only allow SMTP connections from local host.
        Result.Value = 1
     End if
  End If
  
End Sub
</pre>
