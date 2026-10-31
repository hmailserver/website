---
title: "Error messages"
slug: reference_error_messages
parent: book_referenceguide
index: 0
is_book: false
---

## SMTP

### Delivery is not allowed to this address

This error means that the sender is trying to send an email to an address which he is not allowed to send to. This message is generated after hMailServer has checked the IP range settings. As an example, the defualt IP range configuration does not allow external users to send messages to other external users. This is to prevent people from using your server to send spam. So if an external user tries to send a message to another external user, he will get this message.

### SMTP authentication is required.

You have enabled SMTP authentication for the IP range that the user is connecting from, but the user has not configured his client to use SMTP authentication. There's two ways to solve this problem. Either configure your email client to use SMTP authentication. This setting is normally found in the account settings in your email client. Or, disable SMTP authentication for the IP range. The first solution is recommended since it reduces the risk that anyone will send spam through your server.

## DNS errors

### General information

hMailServer uses the Windows API to query the DNS server. hMailServer itself does not not ask Windows to use a specific DNS server. The DNS query is made using the Windows API function DnsQuery. Depending on what DNS error that has occured, DnsQuery return different values. If an error occurs, this error is listed in the hMailServer log.

### 1460, ERROR_TIMEOUT

DNS error 1460 means that there was a timeout when the DnsQuery was made. This can occur if the DNS server is rebooting or isn't available due to network problems.

### 9002, DNS_ERROR_RCODE_SERVER_FAILURE

Error number 9002 means that there was a DNS server failure.
