---
title: "Building hMailServer"
slug: building
parent: book_other
index: 0
is_book: false
---

## Overview

This page describes how to build hMailServer from source. The source code is stored in a CVS repository. If you want to make any changes to the source code and to submit the code back to the community, you will need a username and password. You may use anonymous access as described below, if you just want to download the source code.

## Requirements

- [TortoiseCVS](http://www.tortoisecvs.org/) - An open source CVS client.
- Visual Studio 2003.NET for hMailServer 4.2 and earlier(used to build the server)
- Visual Studio 2005 for hMailServer 4.3 and later (used to build the server). You will need Professional edition or better.
- Visual Basic 6 (used to build hMailAdmin, database setup etc)

## Steps

### 1: Downloading the source code

1. Install TortoiseCVS.
2. Create a development folder, for example `C:Dev` (or anything you like).
3. Open that folder using Windows Explorer.
4. Right-click to select *CVS Checkout*.

Now the *TortoiseCVS - Checkout Module dialog* is shown. This dialog lets you specify what you want to check out.

1. In the *CVSROOT* field, enter `:ext:anonymous@forgecvs1.novell.com:/cvsroot/hmailserver`
2. In the Module field, enter `hmailserver`
3. Select the *Revision* tab
4. Select *Choose branch or tag*
5. Enter the branch name:  

   - H-3-4 for hMailServer 3.4.
  - H-4-0 for hMailServer 4.0.
  - H-4-1 for hMailServer 4.1.
  - H-4-2 for hMailServer 4.2.
  - H-4-3 for hMailServer 4.3
  - H-4-4-B270 for hMailServer 4.4. (This is a tag)
  - If you want the latest build, just leave the branch name empty or use HEAD. However, please note that the latest build is normally very unstable.
6. Click OK to download the source.   
If you are asked for a password, enter `anonymous`.

### 2: Building it

1. In VS2003.NET or VS2005 (depending on hMailServer version), open `hMailServer\hMailServer.sln`
2. Select *Build hMailServer* from the *Build* menu

### 3: Running the server

1. Open the project properties for hMailServer
2. Select *Configuration Parameters->Debugging*
3. Add `/Debug` to Command arguments
4. Click *OK* to save the settings.
5. Select *Start* from the *Debug* menu..

### Building the tools

To build hMailServer Administrator, Database setup and the other tools, use Visual Basic 6
