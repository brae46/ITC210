#!/usr/bin/python

import smtplib

server = smtplib.SMTP('smtp.gmail.com', 587)
server.ehlo()
server.starttls()
server.ehlo
server.login("rthundersonexdm@gmail.com", "Potato123!")

sender = "rthundersonexdm@gmail.com"
receivers = "rthundersonexdm@gmail.com"

message = """From: From Person <from@fromdomain.com>
To: To Person <rthundersonexdm@gmail.com>
MIME-Version: 1.0
Content-type: text/html
Subject: SMTP HTML e-mail test

You are being hacked boi! Go check that.
"""
   
server.sendmail(sender, receivers, message)         
print("Successfully sent email")

server.close()