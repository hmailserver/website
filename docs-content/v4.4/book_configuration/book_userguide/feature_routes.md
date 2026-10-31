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

## Creating a new route

The following example explains how to configure all email for the domain `hmailserver.com` to go through `mx.hmailserver.com` instead of through the default server, `mail.hmailserver.com`:

1. Start hMailAdmin
2. Go to *Settings -> Protocols -> SMTP -> Routes*
3. Click on *Add*
4. In the *Domain* field, enter `hmailserver.com`
5. In the *Target SMTP host* field, enter `mx.hmailserver.com`.
6. Click on Save

Henceforth, all email sent to `hMailServer.com` will go through `mx.hmailserver.com`, instead of through the default server, `mail.hmailserver.com`.
