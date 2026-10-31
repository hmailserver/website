---
title: "Filters"
slug: feature_filters
parent: book_userguide
index: 0
is_book: false
---

# Applies to

hMailServer 3.x.  

In version 4.0, the *Filter* functionality has been replaced by [*Rules*](?page=feature_rules).

## Overview

Filters can be used to delete messages based on sender, recipient and subject. If you get spam from someone, you can add their email addresses to the filter list to avoid getting any more email from them.

You can specify filtering at two different levels, server-level and account-level. A server-level filter affects all accounts on the mail server. Account-level only affects the account for which the filter has been defined.

## Adding a new filter

Follow these steps to add a new filter:

1. Navigate to the filter list where you want to add your filter. There are currently filter lists at two different levels: Server level and Account level
2. Click on *Add*
3. Select the type of filter you want to add
4. Enter a value for the filter. Wildcards can be used.
5. Select the action you want.
6. Click on *Save*

## Notes

- If you do not want to enter the entire value to search for, you must use wildcards
- Filters are applied after the message has been accepted by the server.
