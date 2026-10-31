---
title: "IP range"
slug: reference_iprange
parent: book_referenceguide
index: 0
is_book: false
---

## General

### Name

<div class="indented">The name of the IP range. Any text between 1 and 40 characters. Give IP ranges names that describes the ranges, for example <em>My computer</em>, <em>My LAN</em> and so on.</div>

### Priority

<div class="indented">The priority of the IP range. You can specify a value between 0 and 1000. A higher value means higher priority. If hMailServer matches two IP ranges, the IP range with the highest priority will be used. For example, if a client is matching one IP range with priority 5, and one IP range with priority 10, hMailServer will use the IP range with priority 10. If a client is matching two IP ranges with the same priority, the choice hMailServer will make is undefined.</div>

### Lower IP & Upper IP

<div class="indented">All IP addresses between (and including) Lower IP and Upper IP will be effected by this IP range. For example, the IP address <code>127.0.0.4</code> matches an IP range where the Lower IP is <code>127.0.0.1</code> and the Upper IP is <code>127.0.0.5</code>. The IP address <code>255.255.255.0</code> matches an IP range where both the Lower IP and Upper IP is <code>255.255.255.0</code>.</div>

### Expires

If you want the IP range to be automatically removed, select Expire and specify what date and time you want it to be removed.

The expiry time is not exact to the second - the internal task which removes expired IP ranges runs once every minute. 

### Allow connections

<div class="indented">These settings lets you define which protocols hMailServer will allow, from TCP/IP connections originating from this IP range.</div>

### Allow deliveries

<div class="indented">Define whether hMailServer should allow SMTP deliveries for this IP range. <em>Local accounts</em> means addresses matching an active account on the server. External accounts means every other address. Note that when sending an email from an alias address, the sender is treated as an external account.</div>

If you select "*External to external*", people will be able to send email via the server even if the sender address does not match an account on the server. If you select this option you should make sure that you select the corresponding setting under "*Require SMTP authentication*" as well. Not doing so will open up your server for spammers.

<div class="indented">
<h3>Require SMTP authentication</h3>
<div class="indented">Select who needs to use SMTP authentication to send email via the server. <em>External to external</em> should typically always be selected. If you do not require authentication when external users sends messages through your server, your server will be abused by spammers.</div>
</div>

### Anti-spam

<div class="indented">If this option is enabled, hMailServer will run spam protection (such as SPF, DNS blacklists and MX check) for SMTP deliveries originating from this IP range. You may want to disable this option for your local network.</div>

<div class="indented">
<h3>Anti-virus</h3>
<div class="indented">If this option is enabled, hMailServer will run virus protection on deliveries originating from this IP range. You may want to disable this option for your local network.</div>
</div>

## Recommendations

### Run open relay tests

After you've changed or added an IP range, you should run at least one [open relay test](?page=open_relay_tests) to ensure that no-one can use your server to send spam.

 
