---
title: "Grey listing"
slug: reference_greylisting
parent: book_referenceguide
index: 0
is_book: false
---

## General

Grey listing allows you to prevent spam by temporarily rejecting email to your server. Grey listing benefits from the fact that properly configured email servers will try to resend messages later, while spammers normally will give up immediately if your server rejects an email.

When a sender tries to deliver a message for the first time to your server, hMailServer will save the senders IP adderss, the senders email address and the recipient email address. This information is called a *triplet*. hMailServer will reject the message and kindly ask the sending server to retry later. The next time the sending server tries to deliver an email which matches the triplet, hMailServer will accept the message.

Spam messages which are stopped by grey listing are not counted in the Status page in hMailServer Administrator. Also, even if you configure hMailServer to deliver spam messages but modify header, messages rejected by grey listing will not be delivered due to how the grey listing mechanism work.

### Minutes to defer deliver attempts

<div class="indented">Specify how many minutes hMailServer should wait before accepting a message.</div>

<div class="indented">
<h3>Days before removing unused records<br></h3>
If hMailServer temporarly rejects a message, but the sender does not try to resend the message, hMailServer will remove the triplet after the number of days specified.<br>
<h3>Days before removing used records<br> </h3>
<div class="indented">Using this setting, you can specify how long triplets should exist in hMailServer before being removed. The number of days are counted from the date when the triplet was last used. For example, if a triplet is created on day 1, and re-used on day 5, and this setting is set to 10, the triplet will be removed 15 days after it was created.<br></div>
<div class="indented">
<h2>White listing</h2>
<p>E-mail servers which uses different IP addresses every time they try to send a message to hMailServer, and email servers which does not try to resend messages that has been temporarly rejected is not compatible with grey listing. You can add an IP address to such servers here. hMailServer will not use grey listing for the servers. Wildcards are supported in this list.<br></p>
</div>
</div>
