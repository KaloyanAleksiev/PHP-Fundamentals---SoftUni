<?php

$stringCoordinates = trim(fgets(STDIN));
$arrayCoordinates = explode(', ', $stringCoordinates);

function validityChecker(array $coordinates) {
    echo '{' . $coordinates[0] . ', ' . $coordinates[1] . '} to {0, 0} is ';
    echo compare($coordinates[0], $coordinates[1], 0, 0) . PHP_EOL;
    echo '{' . $coordinates[2] . ', ' . $coordinates[3] . '} to {0, 0} is ';
    echo compare($coordinates[2], $coordinates[3], 0, 0) . PHP_EOL;
    echo '{' . $coordinates[0] . ', ' . $coordinates[1] . '} to {' . $coordinates[2] . ', ' . $coordinates[3] . '} is ';
    echo compare($coordinates[0], $coordinates[1], $coordinates[2], $coordinates[3]) . PHP_EOL;
}

function compare($x1, $y1, $x2, $y2) {
    $x = (pow(($x2 - $x1), 2));
    $y = (pow(($y2 - $y1), 2));
    if ((sqrt($x + $y)) == intval(sqrt($x + $y))) {
        echo 'valid';
    } else {
        echo 'invalid';
    }
}

validityChecker($arrayCoordinates);