<?php


function sendMail($to, $name, $password)
{
    $subject = 'Login Password';
    $message = 'Hey ' . $name . 'your password is ' . $password;
    $status = mail($to, $subject, $message);
    return $status;
}