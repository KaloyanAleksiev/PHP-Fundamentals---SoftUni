<?php

$number = 1234;


$thereIsNoSuchNumber = 0;
$end = 0;
if ($number >= 987) {
    $end = 987;
} else {
    $end = $number;
}
for ($i = 100; $i <= $end; $i++) {
    $firstDigit = substr($i, 0, 1);
    $secondDigit = substr($i, 1, 1);
    $thirdDigit = substr($i, 2, 1);
    if (($i >= 100) && ($i <= 999) && (($firstDigit != $secondDigit) && ($firstDigit != $thirdDigit) && ($secondDigit != $thirdDigit))) {
        $thereIsNoSuchNumber = 1;
        echo $i;
        if($i != 987){
            echo', ';
        }
    }
}
if ($thereIsNoSuchNumber == 0) {
    echo "no";
}    