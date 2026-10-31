---
title: "Logging"
slug: reference_logging
parent: book_referenceguide
index: 0
is_book: false
---

## General

### Enable logging

<div class="indented"> This option enables the logging. If logging is disabled, nothing will be logged except for errors. </div>

### Application

<div class="indented"> The application log contain major server events, such as server start, stop and message delivery information. </div>

### SMTP conversation

<div class="indented"> The SMTP conversation log contains SMTP communication that hMailServer makes. Both when hMailServer acts as a SMTP client (when delivering) and when hMailServer acts as a SMTP server (when receiving). </div>

### POP3 conversation

<div class="indented"> The POP3 conversation log contains POP3 communication that hMailServer makes. Both when hMailServer acts as a POP3 client (when downloading messages from external servers) and when hMailServer acts as a POP3 server (when email clients downloads messages from hMailServer). </div>

### IMAP conversation

<div class="indented"> The IMAP conversation log contains IMAP  communication that hMailServer makes. </div>

### TCP/IP

<div class="indented"> The TCP/IP log contains TCP/IP events, such as DNS queries, connection opening and closing etc. </div>

### Debug messages

<div class="indented"> The Debug messages log contains low level messages. Debug logging should only be turned on when troubleshooting.  </div>

### AWStats

<div class="indented">The AWStats log (saved in hmailserver_awstats.log) contains SMTP delivery events formatteded for <a href="awstats.sourceforge.net">AWstats</a>. <br></div>

<div class="indented">
<h3>Mask passwords<br></h3>
<div class="indented">Use this setting to enable masking of passwords. This is turned on by default, and means that before writing a password to the log, hMailServer replaces it with three stars (***).  </div>
</div>
