---
title: "DCOM permissions"
slug: howto_dcom_permissions
parent: howtos
index: 0
is_book: false
---

## Overview

By default, IIS6 is not allowed to connect to hMailServer because of the Distributed COM permissions that Windows uses. Also, Apache run as a user account with restricted permissions is not allowed to connect by default.

## Steps

Follow these steps to give IIS or Apache the required permissions to connect to hMailServer using DCOM.

1. From the Windows Control Panel, go to Administrative Tools
2. Open Component Services
3. Expand the Component Services folder
4. Expand down to Computers | My Computer | DCOM Config
5. Right-click on hMailServer and select properties
6. Select the Security tab
7. Under "Launch and Activation Permissions", select Customize and click on Edit
8. Under "Group or user names", click Add
9. For IIS6: add the built-in anonymous IIS user account
10. For Apache: add the Apache user account
11. Set the Local Launch and Local Activation permissions for this user to Allow
