---
title: "Anti virus"
slug: reference_antivirus
parent: book_configuration
index: 0
is_book: false
---

## Overview

hMailServer has built-in support for the open source antivirus software, [ClamWin](http://www.clamwin.org/). To use a different virus scanner, use the the External virus scanner feature. It enables you to run any anti virus scanner that supports command line scanning. In the Scanner executable field, you specify the command line that should be used when scanning. In the Return value field, you specify the value that the virus scanner will return when a virus is found. This value varies depending on the virus scanner. See the bottom of this page for a list of virus scanners and their command lines. If you use the macro %FILE% in the command line, hMailServer will replace %FILE% with the full path to the file that needs to be scanned.

### Configuring hMailServer to use an external virus scanner

This example shows how to set up hMailServer to use AVG Free 7. It assumes you have AVG Free installed in C:\Program Files\Grisoft\AVG Free

1. Start hMailServer Administrator
2. Navigate to *Settings -> Protocols -> SMTP -> AntiVirus*
3. Select the *External virus scanner* page.
4. Select *Use external scanner*
5. Specify `the following command line.`The quotation marks (") should be included`:
    "C:\Program Files\Grisoft\AVG Free\avgscan.exe" /EXT=* /NOBOOT /NOMEM /SCAN /NOSELF /NOHIMEM /ARC "%FILE%"`
6. Enter `6` as the return value. (`Avgscan.exe` will return a value of 6 if a virus is found.)

### Scanner command lines

For more examples on virus scanner comma lines, see the [example list](?page=details_antivirus_external_example)

### Testing it

Since testing with real viruses is risky, you can use the EICAR anti-virus test file. It is treated as a virus by anti-virus scanners, but is safe to use since it is not a real virus. These sites enable you to send out email containing the EICAR anti-virus test file:

- [Alpha-tec](http://www.aleph-tec.com/eicar/index.php).
- [Webmail.us](http://www.webmail.us/testvirus?co=&emailAddr=jack%40sharepointmatrix%2Ecom&cset=27&auth=0).

### More information

- [How to determine the return value of a virus scanner](?page=howto_determine_antivirus_external_returnvalue)

### Notes

- The %FILE%-macro functionality only applies to hMailServer 4.0 build 85 and later.

## Settings

### When a virus is found

<div class="indented">Choose <em>Delete e-mail</em> if you want messages containing a virus to be deleted immediately. Chose <em>Delete attachments</em> if you want messages containing viruses to be delivered, but that attachments should be removed. When deleting the email, you can chose to notify the sender and/or recipient of the email that a virus was found in the email.</div>

<div class="indented">
<h3>Maximum message size to virus scan (KB)</h3>
<div class="indented">Most email message which contains viruses are relativly small. Using this setting, you can configure hMailServer to skip virus scanning if a message is larger than a specified size. </div>
</div>

## ClamWin

### Autodetect

<div class="indented">hMailServer can be automatically configured to use ClamWin. To automatically configure hMailServer to use ClamWin, click <em>Autodetect</em>. hMailServer will read ClamWin settings from the Windows registry. After the settings have been autodetected, you should make sure that they are correct.<br>
<br>
Please note that ClamWin must be installed prior to doing this.</div>

## External virusscanner

### Scanner executable

<div class="indented">The path to the anti virus scanner executable that should be run. This should be a command line scanner that does not have a user interface.</div>

### Return value

<div class="indented">The value that the virus scanner will return if a virus is found.</div>

<div class="indented">
<h2>Block attachments</h2>
These settings allows you to block attachments based on the attachment extension. If you enable this feature, hMailServer will remove the attachment and then add a new attachment with the name <span class="Code">&lt;original name&gt;.txt</span> which contains a short message that the attachment has been removed.</div>

 
