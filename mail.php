<?php
$toMailId = 'srb.com2112@gmail.com'; // reciever
$fromMailId = 'web.saurabhsahu@gmail.com'; // sender
$subject = 'Your payment is pending';
$description ="Hello Anikesh,
<br>Your payment is pending, Pls pay your remaining fees asap.";

$headers = "From: web.saurabhsahu@gmail.com" . "\r\n" .
"CC: srbitsolution@gmail.com";

mail($toMailId, $subject, $description, $headers);

echo "mail send successfully...";
?>