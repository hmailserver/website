---
title: "SMTP settings"
slug: reference_smtp
parent: book_referenceguide
index: 0
is_book: false
---

## General

<h3>Connection

<div class="indented">
The maximum number of simultaneous SMTP connections to the server. If this value is set to zero, an unlimited number of simultaneous connections will be allowed. By default, the value is set to zero.
</div>

<h3>Welcome message</h3>

<div class="indented">
The welcome message is sent to SMTP clients directly after they have connected to the server. This message is normally never seen by the sender or receiver. One reason to change the welcome message is to make it harder for other people to determine what server software you are running.
</div>


<h3>Max message size</h3>

<div class="indented">
If a Max Message Size is specified, hMailServer will reject messages larger than that size. If you wish to allow messages of unlimited size, set the value to zero. The size is specified in KB.
</div>


<h2>Delivery of email</h2>

<h3>Number of retries</h3>

<div class="indented">
This setting defines the number of times hMailServer should try to deliver an email. Deliveries may fail for a number of reasons. For example, the recipient's email server may be rebooting or your network may be temporarily unavailable. The default value is 4 retries, which means hMailServer will try a total of 5 times before giving up and returning an error message to the sender.
</div>

<h3>Minutes between every retry</h3>

<div class="indented">
This setting defines how many minutes hMailServer should wait before every retry, when delivering emails to other servers. The default value is 60 minutes. 
</div>

<h3>Host name</h3>

<div class="indented">
When an SMTP server connects to another server to send a message, the first thing the sending server does is to say "hello" to the receiving server. The hello message includes the host name of the sending server. This notifies the receiving server who is sending the email. Since there is no way to auto-detect the host name of a computer, you have to specify this setting manually. 
<br><br>
Example: If hMailServer is running on a machine whose host name is mail.domain.com, you should specify mail.domain.com as host name. If your machine has several public host names, such as mail.domain.com and mail.domain2.com, you may specify any of them as host name. 
</div>


<h3>SMTP relayer</h3>

<div class="indented">
The SMTP relayer setting lets you specify which email server email messages should be delivered to. You should never set the value to "localhost" or to the hostname of your own email server. That would cause hMailServer to try to connect to itself. 
<br><br>
When one SMTP server delivers email to another, DNS-MX lookup is normally used. This means that if you send an email to me, at someone@hmailserver.com, your email server will do an MX lookup for my domain, hmailserver.com. The MX response will tell your server that it should deliver the message to mail.hmailserver.com. That communication occurs via port 25. However, it can happen that your ISP blocks outgoing traffic on the SMTP port (25) to all computers except their own email server. You can therefore not connect to mail.hmailserver.com. In that case, you should configure hMailServer to send all email through your ISP's email server. Your ISP's email server is then your relayer. The value to enter in the relayer field is the name of your ISP's email server. For example, if you happen to use the Swedish broadband provider Bredbandsbolaget, you should specify smtp.bredband.net as SMTP relayer. 
<br><br>
If you don't want to really all outgoing messages through a specific SMTP server, this field should be left empty.
</div>

<h3>SMTP relayer TCP port</h3>

<div class="indented">
The TCP/IP port hMailServer should connect to when delivering to the SMTP relayer.
</div>

<h3>Server requires authentication</h3>

<div class="indented">
Select this if the server you have specified as SMTP relayer requires authentication.
</div>

<h2>Advanced</h2>

<h3>Delivery threads</h3>

<div class="indented">
hMailServer can deliver several email messages at the same time. This setting lets you define how many messages hMailServer should deliver simultaneously. A higher value will require more CPU usage. A lower value may result in slower deliveries. The best setting depends on your hardware and on the volume of messages you wish your server to deliver. For small installations, 3 simultaneous deliveries should be enough. For larger installations, you may want to raise this value to 15 or 20. 
</div>

<h3>TCP port</h3>

<div class="indented">
This setting lets you define what TCP/IP port the hMailServer SMTP server should listen on. The default is port 25. You should normally not change this setting.
</div>


<h3>Delivery log</h3>

<div class="indented">
The delivery log is used to log every delivered email message to the database. You should not confuse the delivery log with the normal hMailServer log that logs to normal files. If you turn on the delivery log, you will need to manually purge the hm_deliverylog tables in the database from time to time. 
</div>

<h3>Rule loop count</h3>

<div class="indented">
This option lets you prevent hMailServer from creating endless message delivery loops. As an example, it's possible to set up an account rule that forwards message from one user (UserA) to another (UserB), and then another rule that forwards the message back from UserB to UserA. To prevent this from resulting in an endless loop, hMailServer limits the number of automatic forwards to the value defined by <i>Rule loop count</i>. (hMailServer 4.2 and later.)
</div></h3>
