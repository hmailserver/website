---
title: "Installation tutorial"
slug: howto_install
parent: book_quickstartguide
index: 0
is_book: false
---

## Installing hMailServer

This page describes the required steps to install hMailServer 5. Before installing hMailServer, you should ensure that your computer fulfills the [system requirements](?page=system_requirements).

### Step 1: Download

The first step is of to download hMailServer. The installation program is available for download at the [download page](http://www.hmailserver.com/?page=download). It is recommended that you download the latest stable version. The file you download has a name of the form *hMailServer-version-build.exe*. As an example, *version-build* might stand for *5.0-Build-305.*

### Step 2: Install

- Double-click on the downloaded file to launch the setup. The first dialog which is shown is the Welcome dialog, in this one, simply click Next.

<p style="text-align: center;"><img src="images/hmailserver_install_step_1.png" alt=""></p>

- The next step is to read the license agreement. If you don't accept the license agreement, please cancel the installation. If you agree, select "I accept the agreement" and click next.

<p style="text-align: center;"><img src="images/hmailserver_install_step_2.png" alt=""></p>

 

- Select the destination folder and click Next. You should select a local drive and not a network folder. It is possible to install hMailServer on removable devices, but you will not be able to run hMailServer from the device on another computer.

<p style="text-align: center;"><img src="images/hmailserver_install_step_3.png" alt=""></p>

- Select which components you want to install and click Next. On the server, you should install all available components. If you have already installed the hMailServer server on another computer and you want to manage that remotely, you only need to install the Administrative tools.

<p style="text-align: center;"><img src="images/hmailserver_install_step_4.png" alt=""></p>

- Select which start menu folder you want to place the hMailServer icons in and click Next.

<p style="text-align: center;"><img src="images/hmailserver_install_step_5.png" alt=""></p>

- Confirm that the settings are correct and then click Install to do the installation.

<p style="text-align: center;"><img src="images/hmailserver_install_step_6.png" alt=""></p>

- Wait... The installation should take about 10-20 seconds.

<p style="text-align: center;"><img src="images/hmailserver_install_step_7.png" alt=""></p>

- After the files have been installed, you need to provide the installation program with a main hMailServer password. In 4.3 and later, a main password is used to increase security. The password can be anything you like as long as it's longer than 5 characters. You will need the password later on when performing server administration, so don't forget it. You only need to specify the password the first time you install hMailServer

<p style="text-align: center;"><img src="images/hmailserver_install_step_8.png" alt=""></p>

- After you have finished the installation, it's time to start hMailServer Administrator (found in the start menu). The first thing which appears is the *Connect* dialog. This dialog allows you to connect to different hMailServer installations in your network. Normally, you will want to connect to *localhost*. Select *localhost*, and click *Connect*. In the password dialog, enter your main hMailServer password and click OK.

<p style="text-align: center;"><img src="images/hmailserver_install_step_9.png" alt=""></p>

## Step 3: Post-installation tasks

### DNS configuration

After installing hMailServer, make sure you configure your DNS server correctly. For SMTP to work, you must define MX records for your domain. MX stands for Mail eXchanger. Simply put, the MX records tell other email servers what server in your domain is responsible for handling mail. Here is [more information about MX records](?page=ts_mx_problems).

### Step 4: Configuring the server

The tutorial for configuring the server is [found here](?page=basic_configuration).

If you are experiencing any problems, please read the [troubleshooting guide](?page=troubleshooting_tips).
