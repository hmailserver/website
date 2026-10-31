---
title: "Application object"
slug: com_application
parent: com_objects
index: 0
is_book: false
---

The Application object is the root object in the hMailServer COM hirearchy. Via this object, you can access all properties, settings and objects in your hMailServer installation.

# Methods

#### Function Authenticate(Username As String, Password As String) As [](?page=com_account)Account

<div class="indented">Call this function to authenticate to the hMailServer COM API. You need to authenticate before you can call any of the objects in the COM API. You can authenticate using the following credentials</div>

<div class="indented">
<ul>
    <li>Username <em>Administrator</em> and your main hMailServer password. If you authenticate using these credentials, you get full access to the hMailServer COM API.</li>
    <li>An hMailServer account user name and password. When authenticating using an hMailServer account, you get access to different parts of the hMailServer API, depending on the administration level specified in the account.</li>
</ul>
</div>

# Properties

#### Property BackupManager As [BackupManager](?page=com_backupmanager)

<div class="indented">Returns the backup manager. Contains backup settings and functions to initiate backup and restore tasks.</div>

#### Property Database As [Database](?page=com_database)

<div class="indented">Returns an instance of the database object. Used check database version, run SQL statements etc.</div>

#### Property Domains As [Domains](?page=com_domains)

<div class="indented">Returns a collection of all the domains. Use this to access domains, accounts, aliases, distribution lists, etc.</div>

#### Property GlobalObjects As [GlobalObjects](?page=com_globalobjects)

<div class="indented">Miscilaneous global objects, such as the delivery queue.</div>

#### Property InitializationFile As String

<div class="indented">The hMailServer.ini hMailServer is currently using.</div>

#### Property Rules As [Rules](?page=com_rules)

<div class="indented">Returns a collection containing all global rules.</div>

#### Property ServerState As eServerState

<div class="indented">Returns the current state of the server.
<ul>
    <li>hStateStopped = 1, Server is stopped.</li>
    <li>hStateStarting = 2, Server is starting.</li>
    <li>hStateRunning = 3, Server is running.</li>
    <li>hStateStopping = 4, Server is stopping.</li>
</ul>
</div>

#### Property Settings As [Settings](?page=com_settings)

<div class="indented">Returns an instance of the settings object. Use this to modify server settings such as TCP/IP ports, virus scanning, black lists etc.</div>

#### Property Status As [Status](?page=com_status)

<div class="indented">Returns the status object. This object contains server metrics such as delivered messages, number of viruses detected etc.</div>

#### Property Utilities As [Utilities](?page=com_utilities)

<div class="indented">Returns the Utilities object. This object contains misc functions, such as decrypting, MD5 routines, test suites, GUID generator and more.</div>

#### Property Version As String

<div class="indented">The hMailServer version.</div>

# Sample code

## Display the current version

`Dim obBaseApp   Set obBaseApp = CreateObject("hMailServer.Application")``Call obBaseApp.Authenticate("Administrator", "yourpassword")   MsgBox "hMailServer version: " & obBaseApp.Version`
