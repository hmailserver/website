---
title: "hMailServer fails to deliver messages to certain servers"
slug: ts_send_messages_to_specific_server
parent: troubleshooting
index: 0
is_book: false
---

This document covers the problem when hMailServer fails to deliver email to a specific server, for example Yahoo or Hotmail. If you have tried to send messages to several different servers, but none works, you should [read this instead](?page=ts_send_messages_outside).

## Missing MX-records

If your domain does not have any MX records set up, other email servers might reject email from your server. If you are unsure of whether your domain has any MX records, either go to [dnsreport.com](http://www.dnsreport.com/), enter your domain and click *DNS Report* or contact the company that registered the domain for you.

## Incorrect records in DNS

Incorrect DNS entries might have the effect that other email servers don't accept email from your domain. To check whether your DNS records are correct, go to [dnsreport.com](http://www.dnsreport.com/), enter your domain and click *DNS Report*.

## Your IP isn't matching your SPF record

If SPF records are set up in the DNS for your domain, you need to ensure that you deliver email from the IP address specified in your SPF records. If you are sending from other IP addresses, many servers will reject email from you.

## Incorrect host name in HELO

In the hMailServer SMTP settings, you need to specify the host name of the computer where you run hMailServer. This should be a host name which has an A-record in the DNS which points at the IP address of your computer. If you enter some other host name, such as *localhost*, *mycomputername*, many servers will reject email from your server.

## Not allowing empty sender address

In the hMailServer SMTP settings, you can choose not to allow email with empty sender addresses. By default, this is allowed, and many email servers will reject email from your server if you disallow this.
