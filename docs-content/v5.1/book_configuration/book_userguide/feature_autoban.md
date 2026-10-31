---
title: "Auto-ban"
slug: feature_autoban
parent: book_userguide
index: 0
is_book: false
---

## Overview

It is a common problem that people use weak passwords which spammers manages to figure out using dictionaries. Using the auto-ban functionality, hMailServer can automatically disconnect these spammers and reduce the risk of your server being used to send spam.

If *Max invalid logon attempts* are made from a specific IP address within *Minutes before reset*, the connecting clients IP address will be auto-banned for *Minutes to auto-ban* minutes.

When a user is banned, an IP range matching the user is automatically created. In this IP range, all protocols are de-selected which has the effect that the user will no longer be able to connect. The new IP range will have an expiry date set which means that it will be removed when *Minutes to auto-ban minutes have passed.*

### Potential problems

When a client is blocked by auto-ban, connections from the clients IP address will be blocked. If you have many clients connecting from the same IP address, this may be a problem - if one user fails to log on 3 times, other users on the same IP address will be blocked as well.

A workaround to this problem is to add a new IP range matching the shared IP address and give this IP range higher priority than any IP range added by the auto-ban functionality. The IP ranges added by auto-ban is given the priority 20, so if your own IP range has priority 25 it will take precedence.
