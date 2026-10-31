---
title: "Receiving messages"
slug: ts_receive_messages_from_outside
parent: troubleshooting
index: 0
is_book: false
---

The most common problems that prevent you from receiving emails are:

## MX problems

All email servers must have MX records defined for the domain they host. MX records are added to DNS. You can verify that your MX records are set up properly, by entering your domain name on [DNSReport.com](http://www.dnsreport.com/). You should enter your domain name, excluding any sub domains. If your domain is something.com, you should enter something.com and not smtp.something.com or mail.something.com. After the search, view the result, under the *MX category*. It should not say *FAIL* anywhere. If it does, your MX records are probably not well set up. [Read more](?page=ts_mx_problems)

## Blocked TCP/IP ports

Some ISPs block TCP/IP port 25 to prevent spamming. Some block inbound traffic on port 25, while others block outbound traffic. To check whether your ISP has blocked inbound traffic, do a query on [DNSReport.com](http://www.dnsreport.com/). After the query, look up the category, *Mail*. It should not say *FAIL* anywhere. If it does, your ISP has probably blocked traffic to or from port 25. [Read more](?page=ts_blocked_ports)

## Port 25 not used

To work properly, all email servers must use port 25 for inbound traffic. If you have reconfigured hMailServer to use another port, you might not be able to receive email. [Read more.](?page=ts_using_nondefault_smtp_port)

## DNS errors

If the DNS records for your domain is not set up properly, you might not be able to receive email. To check whether your DNS records are set up properly, use [DNSReport.com](http://www.dnsreport.com/).

## Incorrect multihoming settings

If you have configured hMailServer to listen on a specific IP address, make sure that the IP address is correct and not a local one, such as 127.0.0.1.

## Incorrect IP ranges

By default, an IP range called Internet is created. If you modify this IP range, there's a risk that you won't be able to receive email from other servers. hMailServer does not accept email from IP addresses which does not match any of the IP ranges.

## Other

If the above description does not apply to your problem, you can ask the forum for suggestions. Before asking, send an email from an external server. Wait for an error message to come back. Include the error message in your post to the forum.
