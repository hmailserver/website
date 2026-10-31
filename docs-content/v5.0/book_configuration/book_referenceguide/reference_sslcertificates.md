---
title: "SSL certificate"
slug: reference_sslcertificates
parent: book_referenceguide
index: 0
is_book: false
---

## SSL certificates

### Name

<div class="indented">The name of the SSL certificate. The name is only used for displaying and must not have any connection to the SSL certificate.</div>

### Certificate file

The certificate file to use.

### Private key file

The private key file to use.

hMailServer will be unable to read the private key if it has a password. Be sure to strip the password from the key before configuring hMailServer to use the file.
