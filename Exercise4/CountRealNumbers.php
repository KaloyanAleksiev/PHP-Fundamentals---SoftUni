<?php

$stringNumbers = fgets(STDIN);
$arrayNumbers = preg_split('/\s+/', trim($stringNumbers));
$arrayCountingNumbers = array();
foreach ($arrayNumbers as $number) {
    if (array_key_exists($number, $arrayCountingNumbers)) {
        $arrayCountingNumbers[$number] ++;
    } else {
        $arrayCountingNumbers[$number] = 1;
    }
}
ksort($arrayCountingNumbers);
//rsort($arrayCountingNumbers);
foreach ($arrayCountingNumbers as $key => $value) {
    echo $key.' -> '.$value.' times'.PHP_EOL;
}