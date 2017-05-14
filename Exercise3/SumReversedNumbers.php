<?php

$string = fgets(STDIN);
$arraySequence = explode(" ", trim($string));
$sum = 0;
foreach ($arraySequence as $value) {
    $reversedNumber = strrev($value);
    $sum = $sum + $reversedNumber;
}   
echo $sum;