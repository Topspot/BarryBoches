<?php
$mails->isSMTP();
$mails->Host = 'smtp.mailgun.org';
$mails->SMTPAuth = true;
$mails->Port = 465; // set the SMTP port
$mails->Username = 'support@speakeasymarketinginc.com';
$mails->Password = 'Spotless@123';
$mails->SMTPSecure = "ssl"; 