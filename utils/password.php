<?php

function generatePassword()
{
    $upperCase =  'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lowerCase = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = "0123456789";
    $specialChar = "@#$%&";

    $upperLength = strlen($upperCase) - 1;
    $str = $upperCase[random_int(0, $upperLength)];
    $str .= $upperCase[random_int(0, $upperLength)];

    $lowerLength = strlen($lowerCase) - 1;
    $str .= $lowerCase[random_int(0, $lowerLength)];
    $str .= $lowerCase[random_int(0, $lowerLength)];

    $specialLength = strlen($specialChar) - 1;
    $str .= $specialChar[random_int(0, $specialLength)];
    $str .= $specialChar[random_int(0, $specialLength)];

    $numberLength = strlen($numbers) - 1;
    $str .= $numbers[random_int(0, $numberLength)];
    $str .= $numbers[random_int(0, $numberLength)];

    return $str;
}