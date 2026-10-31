---
title: "Route"
slug: reference_route
parent: book_referenceguide
index: 0
is_book: false
---

## General

### Domain

<div class="indented"> The domain that this route should be applied to. The domain name is case insensitive. </div>

### Target SMTP host

<div class="indented"> The host to which the emails that this route applies to will be delivered. This should typically be an internet host name such as mail.example.com.<br> </div>

### Security

<div class="indented">This setting lets you define whether the domain should be treated as a local or external domain. This information is used when IP ranges are applied for the delivery of messages. IP ranges let you define which IPs should be allowed to deliver email to local or external domains. As a general recommendation, set the value to A local domain if you wish to use the route to let hMailServer to act as an MX backup. Otherwise, set it to An external domain.</div>

<div class="indented"><br>In a default configuration, if you select that the domain should be treated as an internal domain, anyone will be able to send email through your server to the domain specified in the route. If you select that it should be treated as an external domain, only users which have authenticated (who have an account on your server) will be able to send to the domain</div>

### Addresses

<div class="indented"> This setting lets you define which email addresses hMailServer should allow deliver to. For example, if you know that the only valid address on the target SMTP host is webmaster@domain.com, then you can add this email address to the list. In that case, hMailServer will only allow delivery to this specific address. This saves bandwidth usage. You can configure hMailServer to deliver to all addresses. If you do, hMailServer will forward any email addressed to the domain to the host specified in the route.<br> </div>

### Delivery

<div class="indented"> Use Number of retries to specify the number of times you want hMailServer to retry when sending to this domain. If the route is used for MX backup, you will most likely want to set this to a rather high value. Minutes between every retry lets you specify the number of minutes between hMailServer's retries. For example, if the target SMTP host is down, there is no need to retry every minute. On the other hand, if the target SMTP host goes up, you don't want to wait 10 hours for the server to retry. Use Server requires authentication to specify user name and password if the target SMTP host requires authentication.  </div>

## User guide

More information about routes, and examples on how to use them, can be found in the [user guide](?page=feature_routes).
