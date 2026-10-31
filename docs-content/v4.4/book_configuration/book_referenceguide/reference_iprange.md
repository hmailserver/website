---
title: "IP range"
slug: reference_iprange
parent: book_referenceguide
index: 0
is_book: false
---

## General

### Name

<div class="indented"> The name of the IP range. Any text between 1 and 40 characters. Give IP ranges names that describes the ranges, for example <em>My computer</em>, <em>My LAN</em> and so on. </div>

### Priority

<div class="indented"> The priority of the IP range. You can specify a value between 0 and 1000. A higher value means higher priority. If hMailServer matches two IP ranges, the IP range with the highest priority will be used. For example, if a client is matching one IP range with priority 5, and one IP range with priority 10, hMailServer will use the IP range with priority 10. If a client is matching two IP ranges with the same priority, the choice hMailServer will make is undefined.<br> </div>

### Lower IP & Upper IP

<div class="indented"> All IP addresses between (and including) Lower IP and Upper IP will be effected by this IP range. For example, the IP address <code>127.0.0.4</code> matches an IP range where the Lower IP is <code>127.0.0.1</code> and the Upper IP is <code>127.0.0.5</code>. The IP address <code>255.255.255.0</code> matches an IP range where both the Lower IP and Upper IP is <code>255.255.255.0</code>. </div>

### Allow connections

<div class="indented"> These settings lets you define which protocols hMailServer will allow, from TCP/IP connections originating from this IP range. </div>

### Require authentication for deliveries

<div class="indented"> These settings defines whether hMailServer should require SMTP authentication for deliveries. For example, if you require SMTP authentication for deliveries to external accounts, the sender must supply a username and password when sending the message. In most cases, you should not require SMTP authentication for deliveries to local accounts. </div>

### Allow deliveries

<div class="indented"> Define whether hMailServer should allow SMTP deliveries for this IP range. <em>Local accounts</em> means accounts on the server. E-mail addresses that does not belong to accounts in your hMailServer installation are treated as <em>external accounts</em>. Note that when sending an email from an alias address, the sender is treated as an external account. You should normally <strong>not</strong> enable deliveries <em>from external to external accounts</em> for any IP range. Enabling this allows anyone (including spammers) that connects from the IP range to send email through your server. </div>

### Spam protection

<div class="indented">If this option is enabled, hMailServer will run spam protection (such as SPF, DNS blacklists and MX check) for SMTP deliveries originating from this IP range. You may want to disable this option for your local network.</div>

<div class="indented">
<h3>Forwarding relay<br></h3>
<div class="indented">If this option has been selected, hMailServer will assume that any message received from this IP range is being forwarded. Normally hMailServer uses the senders TCP/IP address when doing spam protection. When hMailServer receives an email from a MX backup, hMailServer can't use the senders TCP/IP address since this is the IP address of the backup server. If this option has been selected, hMailServer will try to determine the original senders IP address by parsing the Received headers of the email.  </div>
</div>

## Recommendations

After you've changed or added an IP range, you should run at least one [open relay test](?page=open_relay_tests) to ensure that no-one can use your server to send spam.
