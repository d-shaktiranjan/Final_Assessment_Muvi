<?php


function sendMail($to, $name, $password)
{
    $subject = 'Login Password';
    $message = 'Hey ' . $name . 'your password is ' . $password;
    $headers = array(
        "From: d.shaktiranjan9@gmail.com",
        "Reply-To: d.shaktiranjan9@gmail.com",
        "X-Mailer: PHP/" . PHP_VERSION
    );
    $headers = implode("\r\n", $headers);
    $status = mail($to, $subject, $message, $headers);
    return $status;
}