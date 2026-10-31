---
title: "Catch-all"
slug: feature_catchall
parent: book_userguide
index: 0
is_book: false
---

## Overview

It is possible to specify an email address that receives all emails
being sent to non-existent addresses on your domain. For example, you
may have `sales@mydomain.com`, `webmaster@mydomain.com` and
`support@mydomain.com` as existing accounts. But there's a risk that someone might misspell an email address, writing `sails@mydomain.com` instead of `sales@mydomain.com`.

The solution is to specify an account - either a previously existing one, or one created for the purpose - to be the *catch-all account*. All email sent to non-existent addresses on the domain will then be delivered to the catch-all account.

## Example

1. Start hMailAdmin
2. Expand the *Domains* node and select the domain, say, `mydomain.com`
3. Create a new account with the name `catchall@mydomain.com`
4. Select your domain, and enter `catchall@mydomain.com` as catch-all address
5. Save the changes

## Notes

- The catch-all address can be any email address you like. It does not have to be strictly of the form `catchall@myDomain.com`
- The catch-all address does not have to belong to an account on your domain or even on hMailServer. You can forward messages to external servers.
- If you want hMailServer to reject any messages sent to non-existent addresses in your domain, you should not specify a catch-all address.
