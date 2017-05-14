<?php

$stringNumbers = fgets(STDIN);

function insideVolume($x, $y, $z) {
    $x1 = 10;
    $x2 = 50;
    $y1 = 20;
    $y2 = 80;
    $z1 = 15;
    $z2 = 50;
    if ($x >= $x1 && $x <= $x2) {
        if ($y >= $y1 && $y <= $y2) {
            if ($z >= $z1 && $z <= $z2) {
                return true;
            }
        }
    }
    return false;
}

$arrayNumbers = explode(", ", trim($stringNumbers));
$countOfNumbers = count($arrayNumbers); 
for($i = 0; $i < $countOfNumbers; $i += 3){
    $x = $arrayNumbers[$i];
    $y = $arrayNumbers[$i+1];
    $z = $arrayNumbers[$i+2];
    if(insideVolume($x, $y, $z)){
        echo 'inside'.PHP_EOL;
    } else {
        echo 'outside'.PHP_EOL;
    }
    
}