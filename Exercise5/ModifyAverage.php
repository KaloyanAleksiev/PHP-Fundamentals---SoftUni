<?php

$number = trim(fgets(STDIN));
$arrayOfDigits = str_split($number);

function averageSum($arrayOfDigits) {
    $countDigits = count($arrayOfDigits);
    $sum = array_sum($arrayOfDigits);
    return $sum / $countDigits;
}

function modifier($arrayOfDigits) {
    if (averageSum($arrayOfDigits) < 5) {
        $arrayOfDigits[]=9;
        modifier($arrayOfDigits);
    } else {
        echo implode('', $arrayOfDigits);
    }
}

modifier($arrayOfDigits);