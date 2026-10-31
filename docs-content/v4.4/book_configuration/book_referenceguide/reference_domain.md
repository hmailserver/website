---
title: "Domain"
slug: reference_domain
parent: book_referenceguide
index: 0
is_book: false
---

## Overview

Every email account in hMailServer must belong to a domain. The domains specified in hMailServer can be local network domains or global internet domains such as hMailServer.com.

## General

### Domain name

<div class="indented">The name of the domain. To be considered valid, a domain name must include a dot. You must set up your DNS servers so that email can be sent to your mail server.</div>

<div class="indented">
<h3>Catch-all address<br></h3>
<div class="indented">If you specify a catch-all address, hMailServer will forward all email with invalid recipients on the domain to this account.</div>
<div class="indented">
<h3>Maximum size (MB)<br> </h3>
<div class="indented">The maximum size for this domain. If you specify this value, the total maximum sizes of all accounts in the domain may not exceed this.</div>
</div>
</div>

## Names

<div class="indented">    One domain can have several names. These are also known as domain aliases. For example, your organization might own the domain, company.com, but it might also own company.org, company.se and company.de. If you want to be able to receive email for all these domains, you will have two options:
<ol>
    <li>          Add all four domains to hMailServer. The problem with this is that you then have to add every email account 4 times, once for each domain.       </li>
    <li>          Add company.com as a domain, and then, under it, in the <em>Names</em>-tab, add company.org, company.se and company.de. That is, you add company.org, company.se and company.de as aliases of company.com. That, usually, is the route most users prefer.       </li>
</ol>
<div class="indented">
<h2>Limits</h2>
<h3>Maximum size (MB)<br> </h3>
<div class="indented">If this value has been specified (is not 0), the system administrator and the domain owner will be prevented from adding accounts so that the total size of all accounts exceeds this value. If you have specified 500MB, the total size of all messages in the domain will not exceed 500MB.<br> </div>
<h3>Maximum message size<br></h3>
<div class="indented">If specified, hMailServer will reject messages larger than this size. </div>
<div class="indented">
<h3>Maximum size of accounts (MB)<br> </h3>
<div class="indented">If this value has been specified (is not 0), the server administrator and the domain owner will be prevented from adding accounts with a total size larger than this value.<br></div>
</div>
<h3></h3>
<h3>Number of accounts, aliases and distribution lists<br> </h3>
<div class="indented">Using these settings, you can limit the number of accounts, aliases and distribution lists server administrators and domain owners can create in this domain.<br></div>
<h2>Signature</h2>
<div class="indented"> On the signature tab, you can configure hMailServer to add a signature to all email sent from this domain. It's possible to enter both a plain text version and a HTML version of the signature. If no HTML signature is specified, hMailServer will use the plain text signature as HTML signature as well.</div>
<div class="indented">
<ul>
    <li>Add signatures to replies<br>If this option has been selected, hMailServer will add signature to replies. To determine whether a message is a reply, hMailServer checks for the In-Reply-To and the References header in the e-mail. This option is de-selected by default.<br></li>
    <li>Add signatures to local email<br>If you select this option, hMailServer will add signatures to local email. An email is considered local in this case if both the sender and all the recipients exist in the same domain. An email sent from one domain to another is not considered local, since the sender and recipient may not be aware of the fact that they both are hosted on the same server.<br></li>
    <li>Enable domain signature<br>If you select this option, the specified signature will be appended to email.<br><br>
    <ul>
        <li>Use signature if none has been specified in the senders account.<br>When selected, hMailServer will only use domain signature if an account signature has not been specified. <br><br></li>
        <li>Overwrite account signature<br>If you select this option, hMailServer will not use the account signatures for this domain. Instead, the domain signature will be used for all emai.<br><br></li>
        <li>Append to account signature<br>When selected, hMailServer will append the account signature with the domain signature. This can be use if you for example want to add disclaimers to all outgoing email.</li>
    </ul>
    </li>
    <li>
    <p>Plain text signature / HTML signature<br>These two fields specify the signature to be used</p>
    </li>
</ul>
<strong>Note:</strong> There are some known design limitations with the current implementation of the signature functionality. Please read <a href="?page=upgrade_42_to_43">the upgrade documentation</a> regarding this.
<h2>Advanced</h2>
<div class="indented">This tab contains the advanced settings for the domain. You normally don't need to modify these settings.</div>
<div class="indented">
<h3>Plus addressing</h3>
<p>Use this option to enable plus addressing for this domain. To avoid confusion and configuration problems, only a limited set of characters are allowed for plus addresing.<br></p>
</div>
<div class="indented">
<h3>Spam protection</h3>
<p>Use this option to enable and disable grey listing for this domain.</p>
<p> </p>
</div>
</div>
</div>
</div>
