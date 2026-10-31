---
title: "Routes"
slug: feature_routes
parent: book_userguide
index: 0
is_book: false
---

## Overview

hMailServer 3.3 and later versions enable you to use routes. Routes specify how and where emails for specific domains should be delivered. Normally, hMailServer uses DNS-MX lookup to determine where email should be delivered. Routes let you override this behaviour. For example,

- Routes enable you to deliver email for a specific domain through a specific server without using MX lookup.
- Routes enable your server to [act as a MX backup](?page=howto_act_as_mx_backup) for another server
- Using routes, you can configure hMailServer to forward email for specific accounts to other SMTP servers, even though the account domain exists in your hMailServer installation.

### Example 1 - Creating a new route

The following example explains how to configure all email for the domain `hmailserver.com` to go through `mx.hmailserver.com` instead of through the default server, `mail.hmailserver.com`:

1. Start hMailServer Administrator
2. Go to *Settings -> Protocols -> SMTP -> Routes*
3. Click on *Add*
4. In the *Domain* field, enter `hmailserver.com`
5. In the *Target SMTP host* field, enter `mx.hmailserver.com`.
6. Click on Save

Henceforth, all email sent to `hMailServer.com` will go through `mx.hmailserver.com`, instead of through the default server, `mail.hmailserver.com`.

### Example 2 - Route all email sent to the domain example.com to another server

This example explains how to route all email sent to the domain example.com to another server. In this example, the domain example.com is a "local" domain which we are hosting ourselves. This may be useful for example if we have updated the MX records for a domain but still want to receive email for the domain on the old IP address in case some SMTP sender has not updated their DNS cache.

1. Start hMailServer Administrator
2. Go to *Settings -> Protocols -> SMTP -> Routes*
3. Click on *Add*
4. In the *Domain* field, enter `example.com`
5. In the *Target SMTP host* field, enter the host name where email for this domain should be forwarded.
6. Select "*Treat this route as a local domain*". With other settings being default, this will have the effect that hMailServer accept email for this domain even if the sender has not authenticated. If the domain is not yours and you don't want other people to send email through your server to this domain, select that it should be treated as an external domain instead.
7. Click on Save

If hMailServer receives an email addressed to the domain example.com, and it cannot find the recipient in the local installation, it will now deliver the email to the host name you specified in the route. If hMailServer can find the recipient in the local installation, the email will be put in the local account instead - hMailServer only forwards email using routes if the recipients cannot be find locally.

### Example 3 - Setting up a server in DMZ forwarding to an internal email server

This example explains how to set up a hMailServer installation in a DMZ which forwards all incoming email to a backend server. One common reason for this set up is that you want anti spam and virus protection to be run outside your internal network. Another common set up is companies who are running MicrosoftExchange internally but do not want to expose this server to the Internet.

1. Start hMailServer Administrator
2. Go to *Settings -> Protocols -> SMTP -> Routes*
3. Click on *Add*
4. In the *Domain* field, enter your domain name, for example `example.com`
5. In the *Target SMTP host* field, enter the host name of the internal email server.
6. Select "*Treat this route as a local domain*". This will have the effect that hMailServer accept email for this domain even if the sender has not authenticated.Click on Save

You should not add the domain to the server in the DMZ - only the route.

If hMailServer receives an email addressed to your domain name, it will forward the message to the backend server.  If hMailServer receives an email for an unknown domain, it will be rejected.

One problem with this configuration is that hMailServer does not know which recipients exists on the internal domain. Because of this, hMailServer will accept messages for any recipient matching your domain name and attempt to forward the message to your internal server. If the recipient does not exist in the internal server, a bounce-message will be created, notifying the sender that the recpiients address was invalid. A workaround to this problem is to add all valid recipients in the Route configuration, so that hMailServer knows what recipients are valid. If you do this, hMailServer will not accept the message from the sender and no bounce message will be sent.
