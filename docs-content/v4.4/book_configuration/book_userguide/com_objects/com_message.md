---
title: "Message object"
slug: com_message
parent: com_objects
index: 0
is_book: false
---

The *Message* object is available in several events and let you retrieve information on the active message.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Methods

#### Sub AddRecipient(sName As String, sAddress As String)

<div class="indented"> This method lets you add an recipient to the message. If the recipient name is unknown, specify an empty string for that parameter. </div>

#### Sub ClearRecipients()

<div class="indented"> This method clears all recipients for the current message. All recipients are removed (To/CC/BCC). The MIME-header of the email is cleared as well. </div>

#### Sub Save()

<div class="indented"> Saves the changes made to the object. If the message is new, this method will cause the message being delivered. </div>

# Properties

#### Property Attachments As [Attachments](?page=com_attachments)

<div class="indented"> This property returns an collection containing the attachments connected to the message. </div>

#### Property Body As String

<div class="indented"> Returns the plain-text contents of this message. </div>

#### Property Date As String

<div class="indented"> Returns the Date-header for this message. In hMailServer 4.0 and earlier, this property was read-only. Note that there is no guarantee that  the value of this header is correct, since it is the sender that puts a value in this header.<br> </div>

#### Property Filename As String

<div class="indented"> Every hMailServer message is stored on a file on the disk. This property returns the name of this file. </div>

#### Property EncodeFields As Boolean

<div class="indented"> Instructs hMailServer to try to MIME-decode and encode the contents of header fields when they are being edited using the API.  When a header field value is updated using the COM API, and EncodeFields is true, hMailServer will try to MIME-encode any non-ascii characters. If EncodeFields is set to true (default), hMailServer will try to MIME-decode the value of header fields before being returned to the COM client. </div>

#### Property From As String

<div class="indented"> This property returns the content of the From MIME-header of the email. </div>

#### Property FromAddress As String

<div class="indented"> Returns the address that the sender gave in the MAIL FROM SMTP-command. </div>

#### Property HeaderValue(FieldName) As String

<div class="indented"> The HeaderValue property lets you read, modify and add MIME-headers in the email message. For example, you can change the subject header by calling Message.HeaderValue("Subject") = "Something new". HeaderValue was added in hMailServer 4.1. </div>

#### Function HasBodyType(BodyType As String) As Boolean

<div class="indented"> Use HasBodyType to determine whether a specific bode type exists. The body type should be a MIME main type plus a sub type, for example text/html. HasBodyType was added in hMailServer 4.1. </div>

#### Property HTMLBody As String

<div class="indented"> The HTML body for this email. If this is empty, no HTML body exist. In hMailServer 4.0 and earlier, this property is read only. </div>

#### Property ID As Long

<div class="indented">The unique database identifier for this email.</div>

<div class="indented">
<h4>Property InternalDate As Variant</h4>
<div class="indented">The internal date and time of this message. Use this property to retrieve a timestamp for when the message was created in the hMailServer installation. This property is read-only.<br> </div>
</div>

#### Property Recipients As [Recipients](?page=com_recipients)

<div class="indented"> Returns a collection containing all recipients for this email.  </div>

#### Property Size As Long

<div class="indented"> Returns the current size of the email message. For performance reasons, this property might not return the correct value for unsaved messages. </div>

#### Property State As Long

<div class="indented"> Returns the current state of this message. 1 means that it is in the delivery queue. 2 means that it has been delivered. </div>

#### Property Subject As String

<div class="indented"> Returns the subject MIME header for this message. </div>

#### Property To As String

<div class="indented"> Returns the To MIME header for this message. </div>
