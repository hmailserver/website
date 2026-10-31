---
title: "External antivirus scanner"
slug: feature_antivirus_external
parent: book_userguide
index: 0
is_book: false
---

## Overview

hMailServer has built-in support for the open source antivirus software, [ClamWin](http://www.clamwin.org/). To use a different virus scanner, use the the *External virus scanner* feature. It enables you to run any anti virus scanner that supports command line scanning. In the *Scanner executable* - field, you specify the command line that should be used when scanning. In the *Return value* - field, you specify the value that the virus scanner will return when a virus is found. This value varies depending on the virus scanner. See the bottom of this page for a list of virus scanners and their command lines. 

If you use the macro %FILE% in the command line, hMailServer will replace %FILE% with the full path to the file that needs to be scanned.

## Configuring hMailServer to use an external virus scanner

This example shows how to set up hMailServer to use *AVG Free* 7. It assumes you have *AVG Free* installed in `C:\Program Files\Grisoft\AVG Free`.

1. Start hMailServer Administrator
2. Navigate to *Settings -> Protocols -> SMTP -> AntiVirus*
3. Select the *External virus scanner* page.
4. Select *Use external scanner*
5. Specify `the following command line.`The quotation marks (") should be included`:"C:\Program Files\Grisoft\AVG Free\avgscan.exe" /EXT=* /NOBOOT /NOMEM /SCAN /NOSELF /NOHIMEM /ARC "%FILE%"`
6. Enter `6` as the return value. (`Avgscan.exe` will return a value of 6 if a virus is found.)

## Scanner command lines

For more examples on virus scanner comma lines, see the [example list](?page=feature_antivirus_external_example).

## Testing it

Since testing with real viruses is risky, you can use the EICAR anti-virus test file. It is treated as a virus by anti-virus scanners, but is safe to use since it is not a real virus. These sites enable you to send out email containing the EICAR anti-virus test file:

- [Alpha-tec](http://www.aleph-tec.com/eicar/index.php).
- [Webmail.us](http://www.webmail.us/testvirus?co=&emailAddr=jack%40sharepointmatrix%2Ecom&cset=27&auth=0).

## More information

- [How to determine the return value of a virus scanner](?page=feature_antivirus_external_returnvalue)

## Notes

- The %FILE%-macro functionality only applies to hMailServer 4.0 build 85 and later.
