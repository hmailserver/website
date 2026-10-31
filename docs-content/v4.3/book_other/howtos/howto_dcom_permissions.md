---
title: "DCOM permissions"
slug: howto_dcom_permissions
parent: howtos
index: 0
is_book: false
---

## Overview

By default, IIS6 is not allowed to connect to hMailServer because of the Distributed COM permissions that Windows uses.

## Steps

Follow these steps to give IIS the required permissions to connect to hMailServer using DCOM.

1. From the Windows Control Panel, go to Administrative Tools
2. Open Component Services
3. Expand the Component Services folder
4. Expand down to Computers | My Computer | DCOM Config
5. Right-click on hMailServer and select properties
6. Select Security tab
7. Under Launch and Activation Permissions, select Customize and click on Edit
8. Set the Local Launch and Local Activation permissions of the built-in anonymous IIS user to Allow.
