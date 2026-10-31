---
title: "SSL encryption"
slug: feature_ssl
parent: book_userguide
index: 0
is_book: false
---

<h2><span style="font-weight: bold;">Overview</span></h2>

hMailServer 5 has built-in support for SSL. This means that after having obtained a SSL certificate, you can encrypt the email traffic between you and your users. Normal email traffic on the Internet is sent unencrypted, which means that the email messages are often readable by 3rd parties. For example, if a user on an unencrypted wireless network sends an email, other parties may intercept the wireless traffic and read the email. Other examples includes Internet Service Providers which are analyzing their users email communication and curious government agencies.

### Obtaining a SSL certificate

There are two methods to obtain a SSL certificate. You can either purchase a SSL certificate from a certificate authority, or you can create your own, self-signed certificate. Purchasing a certificate from a trusted certificate authority generally leads to higher security than creating a self-signed certificate.

Email clients are not configured to trust self-signed certificates. This means that if you use a self-signed certificate, a warning dialog should be displayed when you connect to the server. In many email clients, you can choose to ignore the warning and still connect. This is another reason that it is better to purchase a certificate from a trusted authority.

There are a large number of organizations which sells SSL certificates which can be find using Google. If you prefer creating your own SSL certificate, the easiest way to do that is to use [OpenSSL](http://www.slproweb.com/products/Win32OpenSSL.html). 

Purchasing a SSL certificate generally includes the following steps:

1. You generate a private key, using OpenSSL.
2. You generate a certificate signing request, using OpenSSL.
3. You remove the password key from the private key.
4. You order a certificate from the certificate authority and provide them with the certificate signing request
5. The certificate authority sends the certificate to you.
6. You configure hMailServer to use the private key and SSL certificate.

Creating a self-signed SSL certificate generally includes the following steps:

1. You generate a private key, using OpenSSL.
2. You generate a certificate signing request, using OpenSSL.
3. You remove the password key from the private key.
4. Using OpenSSL, you generate the self-signed certificate.
5. You configure hMailServer to use the private key and SSL certificate.

### Configuring hMailServer to use a SSL certificate

There are two tasks involved with configuring hMailServer to use an SSL certificate:

**Adding the SSL certificate to hMailServer**

1. Start hMailServer Administrator
2. Navigate to Settings->Advanced->SSL certificate
3. Click Add
4. Type in a SSL certificate name. This can be anything you like, but it's suggested that you set it to the host name in the SSL certificate.
5. Select the certificate file and private key filed
6. Save the changes

After following these steps, hMailServer knows about the SSL certificate, but you also need to tell hMailServer when to use it.

**Configuring hMailServer to use the SSL certificate**

1. Start hMailServer Administrator
2. Navigate to Settings->Advanced->TCP/IP ports
3. Select a port 
4. Select "Use SSL" and the certificate.
5. Save the changes
6. Restart hMailServer

This will have the effect that all traffic sent on this port will be encrypted using the certificate. Normally you want to add an additional TCP/IP port in the hMailServer and select to use SSL for that port. Note that all clients connecting to the port must be configured to use SSL.

### Configuring clients

After having configured hMailServer to use SSL certificates, you must configure the clients to do it as well. This typically involves opening the account settings in the email client and selecting that the server uses SSL.

If you want SMTP communication between you and your users to be encrypted, you must configure the TCP/IP port for SMTP to use SSL. However, since other e-mail servers delivering email to hMailServer will not know that you require SSL, you typically must create a second TCP/IP port for SMTP, configure it to use SSL. After that, you need to reconfigure clients to connect to the new TCP/IP port and to use SSL. This way, other email servers will continue delivering email unencrypted on port 25, while your users will deliver email to you on a secondary port.

### Recommendations

It's recommended that you use a RSA key.

### Security considerations

When hMailServer connects to another server using SSL (during a SMTP delivery or download from an external account), it does not verify the servers SSL certificate. This means that the the communication between the client and server is crypted and hence less open for eavesdropping than an unencrypted connections. But it is still vulnerable to a man in the middle attack since hMailServer does not verify that it is actually talking to the correct server.

To make hMailServer verify the servers certificate, a few steps must be taken:

<ol>
    <li>Determine the certificate authority who have provided the certificate of the server you are connecting to. This can be done by running the command:<br>
    <em>openssl s_client <span class="Keyword">-</span>connect ${<span class="Variable">URL</span>}:${<span class="Variable">PORT</span>}</em> <br>
    for example:<br>
    <em>openssl s_client -connect pop.gmail.com:995</em><br>
    The authority will be listed in the end of the certificate chain.</li>
    <li>Retrieve the certificate from the certificate authority. This can be done either by contacting the certificate authority, or by exporting it from your local web browser. Firefox includes certificates for most larger certificate authorities. The certificate file must be in PEM format.</li>
    <li>Calculate the hash for the certificate. This can be done by executing the following command:<br>
    openssl x509 -in "C:\path\to\ca.pem"  -hash<br>
    The first line will show the hash of the file. As an example, the hash for Equifax Secure CA is 594f1775.</li>
    <li>Rename the certificate PEM file to &lt;hash&gt;.0 (the file name should be hash and the extension should be 0 (a zero). In the Equifax example, the file should be named 594f1775.0.</li>
    <li>Place the file in the folder C:\Program Files\hMailServer\Externals\CA.</li>
    <li>Restart the hMailServer service.</li>
</ol>

After the steps above has been taken, hMailServer will always try to verify the server certificate when connecting to a SSL server port. If the verification fails, hMailServer will drop the connection. Note that this will happen for all SSL ports and not just the ones you have installed certificates for.

For further security, you may want to set permissions for the certificate file so that only the hMailServer service can access it.
