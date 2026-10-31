---
title: "Multihoming"
slug: feature_multihoming
parent: book_userguide
index: 0
is_book: false
---

## Overview

By default, hMailServer listens on all available IP addresses. This means that, if your machine has multiple IP addresses, an email client can connect to any of them. However, in certain cases, you might want hMailServer to listen on only one or two of all the available IP addresses. The multihoming feature enables a computer to listen on a restricted number of IP addresses. You may apply multihoming, for example, if you are running another email server, and only want to test hMailServer. You will then use multihoming to configure hMailServer to only listen on a local address.

When hMailServer starts, it creates one TCP/IP socket for every IP address it should listen on. If you have configured hMailServer to listen on all available sockets, it will create a single socket that listens on the address `0.0.0.0`.

## Setting up multi-homing

1. Start hMailAdmin
2. Select *Settings -> Advanced -> Multihoming*
3. Select whether you want hMailServer to listen on all TCP/IP addresses or only on a specific list of addresses
4. Click on *Save* to save your changes

If you select that hMailServer should only listen on a specific list of addresses, you should add at least one IP address to that list. Otherwise, hMailServer won't listen on any addresses at all, hence will be redundant.
