<?php
$mail->isSMTP();
$mail->Host = 'smtp.mailgun.org';
$mail->SMTPAuth = true;
$mail->Port = 465; // set the SMTP port
$mail->Username = 'support@speakeasymarketinginc.com';
$mail->Password = 'Spotless@123';
$mail->SMTPSecure = "ssl"; 