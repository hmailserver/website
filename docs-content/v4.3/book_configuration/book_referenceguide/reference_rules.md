---
title: "Rules"
slug: reference_rules
parent: book_referenceguide
index: 0
is_book: false
---

## Rules

### Name

<div class="indented">The name of the rule. This can be anything you like.</div>

<div class="indented">
<h3>Criteria</h3>
<div class="indented">The criteria for this rule. Messages matching the criteria will be affected by the rule actions.</div>
<div class="indented">
<ul>
    <li>Use AND - All of the criterias must match for the message to be effected by the rule.</li>
    <li>Use OR - If one criteria matches, the message will be effected by the rule.</li>
</ul>
<h4>Predefined field</h4>
<ul>
    <li>From - The From MIME-header in the email message.</li>
    <li>To - The To MIME-header in the email message.</li>
    <li>CC - The CC MIME-header in the email message.</li>
    <li>Recipient list - A list of all actual message recipients. This list is taken from the SMTP envelope, not from the MIME headers.</li>
    <li>Subject - The Subject MIME-header of the email message.</li>
    <li>Body - The Body of the email message. This includes both the plain text body and the HTML body.</li>
    <li>Message size - The size of the message</li>
</ul>
<h4>Custom header field</h4>
<p>If the header you want to filter on does not exist in the list of predefined fields, you can enter the name of the MIME-header in this field.</p>
<h4>Search types<br> </h4>
<ul>
    <li>Equals - The value / string must match exactly<br></li>
    <li>Not equals - The value / string must not match.</li>
    <li>Contains - Partial match</li>
    <li>Not contains - The value must not exist in the Predefined field / custom header field.</li>
    <li>Less than - Can only be used for values<br></li>
    <li>Greater than - Can only be used for values.</li>
    <li>Regular expression - Use a regular expression to search for a value.</li>
</ul>
<h4>Value</h4>
<p>Enter the value to search for, or a regular expression to use.</p>
<h3>Actions</h3>
<div class="indented">The action hMailServer should take when a message matches the rule criteria.</div>
<ul>
    <li>Delete email - The message will be deleted and not delivered to the recipient<br></li>
    <li>Forward email - Forward the message to the specified address. The message will still be delivered to the original recipient</li>
    <li>Move to IMAP folder - Move the message to a specific IMAP folder. This only applies when the delivery is local. If the folder does not already exist, it is created.<br></li>
    <li>Reply - Reply to the sender with the specified message</li>
    <li>Run function - Runs a function in the hMailServer script file.</li>
</ul>
<p> </p>
</div>
</div>
