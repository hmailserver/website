---
title: "ClamWin"
slug: feature_clamwin
parent: book_userguide
index: 0
is_book: false
---

## Overview

ClamWin is an open source virus scanner which runs on Windows.

## Configuring hMailServer to use ClamWin

1. Install ClamWin from [http://www.clamwin.com/](http://www.clamwin.com/)
2. Start hMailAdmin
3. Select *Settings -> Protocols -> SMTP -> Anti Virus*
4. Click on the *ClamWin* tab
5. Select *Use ClamWin*
6. Click *Auto-detect*

## Notes

- If the autodetection of the paths fails, you will have to enter the paths manually.
- To test the virus scanning capability, [download a test virus](http://www.eicar.org/anti_virus_test_file.htm) from eicar. Practically all virus scanners treat the test virus, `eicar.com`, as if it was a real virus. The file contains a string that makes the scanners think they've detected a real virus. To test the antivirus functionality in hMailServer, attach the `eicar.com` file to an email and send it through hMailServer.
