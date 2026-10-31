---
title: "Act as a MX backup"
slug: howto_act_as_mx_backup
parent: howtos
index: 0
is_book: false
---

## Background

In DNS it is possible to configure a domain to have multiple mail exchange(MX) records. The different MX records have different preferences or priority. The sender of an e-mail will first try to deliver to the MX with the lowest preference, and then to the others. The e-mail servers running on the MX records with high preference can therefore be seen as backup mail servers.

## Example

<table width="350">
    <tbody>
        <tr>
            <td><b>Host</b></td>
            <td><b>Preference</b></td>
        </tr>
        <tr>
            <td>mail.hmailserver.com</td>
            <td>25</td>
        </tr>
        <tr>
            <td>mail-backup.hmailserver.com</td>
            <td>50</td>
        </tr>
    </tbody>
</table>

The sender of an email to me will first try to deliver to my server, mail.hmailserver.com. If the delivery to my host fails for any reason, for example, due to network errors or a machine crash, the sender will try to deliver to the server, mail-backup.hmailserver.com. The server mail-backup.hmailserver.com will then have to forward the email to mail.hmailserver.com whenever that goes online. The steps show how to configure the hMailServer installation running on mail-backup.hmailserver.com to forward all email for the domain hmailserver.com to the host mail.hmailserver.com.

## Steps

1. Start up hMailAdmin.
2. Go to the Settings
3. Expand the SMTP settings node
4. Select Routes and click Add.
5. Specify the following:
   - *Domain* - The name of the domain you wish to backup. This should not be a domain configured on your server.
  - *Target SMTP Host* - The host name or, preferably, the IP address of the computer all e-mails to the domain should be forwarded to.
  - *TCP Port* - The TCP/IP port that the Target SMTP host is listening on.
  - Select that sender should be treated as external and recipients as local. When someone sends an email from the route domain name, they should be treated as external. If someone sends an email to the domain name, it should be treated as local. This has the effect that hMailServer will allow delivery to the route domain name without SMTP authentication.
  - *Address page* - If you have a list of the existing e-mail addresses on the target SMTP host, you can specify them here. If you do this, hMailServer will reject e-mail sent to non-existing addresses.
  - *Delivery page* - Specify the number of times hMailServer should try to deliver to this server.

The above instructions are valid for version 5.2 and later.  

  

![](images/howto_act_as_mx_backup.png)
