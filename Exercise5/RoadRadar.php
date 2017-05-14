<?php

$speed = fgets(STDIN);
$area = fgets(STDIN);

function getAreaLimit($area) {
    switch ($area) {
        case 'motorway':
            $speedLimit = 130;
            break;
        case 'interstate':
            $speedLimit = 90;
            break;
        case 'city':
            $speedLimit = 50;
            break;
        case 'residential':
            $speedLimit = 20;
            break;
        default :
            echo 'Not a Valid Input';
            $speedLimit = 1000;
    }
    return $speedLimit;
}

function getInfraction($speed, $limit) {
    $overSpeed = $speed - $limit;
    if ($overSpeed < 0) {
        $result = false;
    } elseif ($overSpeed <= 20) {
        $result = 'speeding';
    } elseif ($overSpeed <= 40) {
        $result = 'excessive speeding';
    } else {
        $result = 'reckless driving';
    }
    return $result;
}

$limit = getAreaLimit(trim($area));
$infraction = getInfraction($speed, $limit);
if ($infraction) {
    echo $infraction;
}