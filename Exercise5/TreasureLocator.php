<?php

$stringCoordinates = trim(fgets(STDIN));
$arrayCoordinates = explode(', ', $stringCoordinates);

function currentLocation(array $arrayCoordinates) {
    $numberOfLocations = count($arrayCoordinates);
    for ($i = 0; $i < $numberOfLocations; $i = $i + 2) {
        $x = $arrayCoordinates[$i];
        $y = $arrayCoordinates[$i + 1];
        islandFounder($x, $y);
    }
}

function islandFounder(int $x, int $y) {
    if ($x >= 8 && $x <= 9 && $y >= 0 && $y <= 1) {
        echo 'Tokelau';
    } elseif ($x >= 1 && $x <= 3 && $y >= 1 && $y <= 3) {
        echo 'Tuvalu';
    } elseif ($x >= 5 && $x <= 7 && $y >= 3 && $y <= 6) {
        echo 'Samoa';
    } elseif ($x >= 0 && $x <= 2 && $y >= 6 && $y <= 8) {
        echo 'Tonga';
    } elseif ($x >= 4 && $x <= 9 && $y >= 7 && $y <= 8) {
        echo'Cook';
    } else{
        echo 'On the bottom of the ocean';
    }
    echo PHP_EOL;
}

currentLocation($arrayCoordinates);