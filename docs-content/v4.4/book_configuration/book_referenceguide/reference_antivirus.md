---
title: "Anti virus"
slug: reference_antivirus
parent: book_referenceguide
index: 0
is_book: false
---

## General

### When a virus is found

<div class="indented">Choose <em>Delete e-mail</em> if you want messages containing a virus to be deleted immediately. Chose <em>Delete attachments</em> if you want messages containing viruses to be delivered, but that attachments should be removed. When deleting the email, you can chose to notify the sender and/or recipient of the email that a virus was found in the email.</div>

<div class="indented">
<h3>Maximum message size to virus scan (KB)<br></h3>
<div class="indented">Most email message which contains viruses are relativly small. Using this setting, you can configure hMailServer to skip virus scanning if a message is larger than a specified size.  </div>
</div>

## ClamWin

### Autodetect

<div class="indented"> hMailServer can be automatically configured to use ClamWin. To automatically configure hMailServer to use ClamWin, click <em>Autodetect</em>. hMailServer will read ClamWin settings from the Windows registry. After the settings have been autodetected, you should make sure that they are correct. </div>

## External virusscanner

### Scanner executable

<div class="indented"> The path to the anti virus scanner executable that should be run. This should be a command line scanner that does not have a user interface. </div>

### Return value

<div class="indented"> The value that the virus scanner will return if a virus is found. </div>

### User guide

<div class="indented">More information about integrating an external virus scanner can be found in the <a href="?page=feature_antivirus_external">user guide</a>.</div>

<div class="indented">
<h2>Block attachments<br></h2>
These settings allows you to block attachments based on the attachment extension. If you enable this feature, hMailServer will remove the attachment and then add a new attachment with the name <span class="Code">&lt;original name&gt;.txt</span> which contains a short message that the attachment has been removed.<br></div>
