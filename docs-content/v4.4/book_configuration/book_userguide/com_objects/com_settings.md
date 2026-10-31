---
title: "Settings object"
slug: com_settings
parent: com_objects
index: 0
is_book: false
---

The cache object contains settings that relates to the hMailServer caching functionality.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property AllowSMTPAuthPlain As Boolean

<div class="indented">Allow plain SMTP authentication.</div>

#### Property AntiVirus As [AntiVirus](?page=com_antivirus)

<div class="indented">Returns an object of type AntiVirus that contains the anti virus settings.</div>

#### Property Backup As [BackupSettings](?page=com_backupsettings)

<div class="indented">Returns an object of type Backup that contains the backup settings.</div>

#### Property Cache As [Cache](?page=com_cache)

<div class="indented">Returns an object of type Cache that contains the cache settings.</div>

#### Property DenyMailFromNull As Boolean

<div class="indented">This property lets you specify whether hMailServer should allow SMTP-deliveries without sender address.</div>

#### Property DNSBlackLists As [DNSBlackLists](?page=com_dnsblacklists)

<div class="indented">Returns a collection of the DNS blacklists.</div>

#### Property HostName As String

<div class="indented">The host name used by hMailServer when delivering messages (used in SMTP HELO command).</div>

#### Property IMAPPort As Long

<div class="indented">The TCP/IP port that the IMAP server should use.</div>

#### Property IPHomes As [IPHomes](?page=com_iphomes)

<div class="indented">Returns a collection of IP homes used by hMailServer when multihoming is enabled.</div>

#### Property ListenOnAllAddresses As Boolean

<div class="indented">Should hMailServer listen on all available IP addresses?</div>

#### Property Logging As [Logging](?page=com_logging)

<div class="indented">Returns an object of type Logging that contain all log-related settings.</div>

#### Property MaxDeliveryThreads As Long

<div class="indented">The maximum number of SMTP delivery threads.</div>

#### Property MaxMessageSize As Long

<div class="indented">The maximum message size that this server should allow.</div>

#### Property MaxPOP3Connections As Long

<div class="indented">The maximum number of simultaneous POP3 connections.</div>

#### Property MaxSMTPConnections As Long

<div class="indented">The maximum number of simultaneous SMTP connections.</div>

#### Property MirrorEMailAddress As String

<div class="indented">The mirror address hMailServer should send messages to.</div>

#### Property POP3Port As Long

<div class="indented">The TCP/IP port used by the POP3 server.</div>

#### Property Routes As Routes

<div class="indented">Returns a collection containing the routes used by hMailServer.</div>

#### Property RuleLoopLimit As Long

<div class="indented">The maximum number of times a message can be processed by rules.</div>

#### Property Scripting As [Scripting](?page=com_scripting)

<div class="indented">Returns an object of type Scripting that contain all script-related settings.</div>

#### Property SecurityRanges As [SecurityRanges](?page=com_securityranges)

<div class="indented">Returns a collecton containing the SecurityRanges / IP ranges used by hMailServer.</div>

#### Property SendStatistics As Boolean

<div class="indented">This option lets you specify whether hMailServer should send delivery statistics to hMailServer.com</div>

#### Property ServiceIMAP As Boolean

<div class="indented">This option lets you specify whether IMAP should be enabled.</div>

#### Property ServicePOP3 As Boolean

<div class="indented">This option lets you specify whether POP3 should be enabled.</div>

#### Property ServiceSMTP As Boolean

<div class="indented">This option lets you specify whether SMTP should be enabled.</div>

#### Property SMTPMinutesBetweenTry As Long

<div class="indented">Number of minutes between each try when delivering an e-mail.</div>

#### Property SMTPNoOfTries As Long

<div class="indented">Number of retries when SMTP server delivers an e-mail.</div>

#### Property SMTPPort As Long

<div class="indented">The TCP/IP port to use  for the SMTP server.</div>

#### Property SMTPRelayer As String

<div class="indented">The SMTP server that hMailServer should deliver all messages to.</div>

#### Property SMTPRelayerPort As Long

<div class="indented">The SMTP port to use when delivering to the SMTP relayer.</div>

#### Property SMTPRelayerRequiresAuthentication As Boolean

<div class="indented">Set to true if the SMTP relayer requires authentication. False otherwise.</div>

#### Property SMTPRelayerUsername As String

<div class="indented">The user name that hMailServer should use when delivering e-mail to the SMTP relayer.</div>

#### Property TarpitCount As Long

<div class="indented">The tarpit count.</div>

#### Property TarpitDelay As Long

<div class="indented">The tarpit delay.</div>

#### Property UseDeliveryLog As Boolean

<div class="indented">True if hMailServer should use the delivery log. False otherwise.</div>

#### Property UseMXChecks As Boolean

<div class="indented">True if hMailServer should use MX checks during spam protection.</div>

#### Property UserInterfaceLanguage As String

<div class="indented">The language in which the user interface should be shown.</div>

#### Property UseSPF As Boolean

<div class="indented">Set this option to true if hMailServer should do SPF checks during spam protection. False otherwise.</div>

#### Property WelcomeIMAP As String

<div class="indented">The welcome / banner message that the IMAP server should use when a client has connected to the server.</div>

#### Property WelcomePOP3 As String

<div class="indented">The welcome / banner message that the POP3 server should use when a client has connected to the server.</div>

#### Property WelcomeSMTP As String

<div class="indented">The welcome / banner message that the SMTP server should use when a client has connected to the server.</div>

# Methods

#### Sub SetSMTPRelayerPassword(newVal As String)

<div class="indented">Sets the password that hMailServer use when delivering a message to an external SMTP server and SMTP authentication is enabled.</div>
