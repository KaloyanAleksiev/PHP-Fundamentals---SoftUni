<?php

$stringPoints = trim(fgets(STDIN));
$arrayPoints = explode(', ', $stringPoints);

function calculateDistances(array $arrayPoints) {
    $numberOfLocations = count($arrayPoints) / 2;
    $arrayDistance = [];
    for ($i = 0; $i < $numberOfLocations; $i++) {
        for ($j = $i + 1; $j < $numberOfLocations; $j++) {
            $arrayDistance[] = sqrt(pow(($arrayPoints[$j + $j] - $arrayPoints[$i + ($i)]), 2) + pow(($arrayPoints[$j + $j + 1] - $arrayPoints[$i * 2 + 1]), 2));
            //($j + $j).($i + ($i)).($j + $j + 1).($i * 2 + 1)
        }
    }
    return $arrayDistance;
}

function rearengeDistances(array $arrayDistances) {
    $temp = $arrayDistances[1];
    $arrayDistances[1] = $arrayDistances[2];
    $arrayDistances[2] = $temp;
    return $arrayDistances;
}

$arrayCalculatedDistances = calculateDistances($arrayPoints);
$arrayDistances = rearengeDistances($arrayCalculatedDistances);

if (($arrayDistances[0] <= $arrayDistances[2]) && ($arrayDistances[2] >= $arrayDistances[1])) {
    $sum = $arrayDistances[0] + $arrayDistances[1];
    echo '1->2->3: ' . $sum;
} else if (($arrayDistances[0] <= $arrayDistances[1]) && ($arrayDistances[2] < $arrayDistances[1])) {
    $sum = $arrayDistances[2] + $arrayDistances[0];
    echo '2->1->3: ' . $sum;
} else {
    $sum = $arrayDistances[1] + $arrayDistances[2];
    echo '1->3->2: ' . $sum;
}