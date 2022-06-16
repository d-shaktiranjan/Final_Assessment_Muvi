<?php
$to      = 'debatashaktiranjan@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = array(
    "From: d.shaktiranjan9@gmail.com",
    "Reply-To: d.shaktiranjan9@gmail.com",
    "X-Mailer: PHP/" . PHP_VERSION
);
$headers = implode("\r\n", $headers);
$status = mail($to, $subject, $message, $headers);
var_dump($status);