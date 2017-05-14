<?php

$number = trim(fgets(STDIN));
$stringOperations = trim(fgets(STDIN));
$arrayOperations = explode(', ', $stringOperations);

function chopChop($number) {
    return $number / 2;
}

function dice($number) {
    return ($number > 0) ? sqrt($number) : ($number);
}

function spice($number) {
    return $number + 1;
}

function bake($number) {
    return $number * 3;
}

function fillet($number) {
    return $number - (($number * 2) / 10);
}

function performOperation($number, $operation) {
    static $keepNumber;
    if (!isset($keepNumber)) {
        $keepNumber = $number;
    }
    if ($operation == 'chop') {
        $operation = 'chopChop';
    }
    $keepNumber = call_user_func($operation, $keepNumber);
    return $keepNumber;
}

foreach ($arrayOperations as $Operation) {
    echo performOperation($number, $Operation) . PHP_EOL;
}