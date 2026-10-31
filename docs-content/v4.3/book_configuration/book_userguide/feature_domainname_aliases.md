---
title: "Domain name aliases"
slug: feature_domainname_aliases
parent: book_userguide
index: 0
is_book: false
---

## Overview

It is possible, in hMailServer 4.0 and later, to specify a list of alternate names for an hMailServer domain. Suppose you have the domains `mydomain.com`, `mydomain.org` and `mydomain.net`. You would like to host all of these on hMailServer, but do not want to add three separate domains. The solution is to add one single domain and then specify a list of valid names for that domain. However, every account will now have three aliases; if your account is `johndoe@mydomain.com`, you will also receive email sent to both `johndoe@mydomain.org` and `johndoe@mydomain.net`.

## Example

1. Start hMailAdmin.
2. Expand the *Domains* node and select the domain (e.g. `mydomain.com`).
3. Select the *Names* tab.
4. Add the domain names to the list (e.g. `mydomain.org` and `mydomain.net`)

## Notes

- You should not add the primary name (in our example, `mydomain.com`) to the list.
