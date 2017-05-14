<?php

$string = fgets(STDIN);
$rotations = fgets(STDIN);
$arrayRotate = explode(" ", trim($string));
$arraySums = array();
for ($i = 0; $i < $rotations; ++$i) {
    array_unshift($arrayRotate, $arrayRotate[count($arrayRotate) - 1]);
    array_pop($arrayRotate);
    foreach ($arrayRotate as $key => $value) {
        if (array_key_exists($key, $arraySums)) {
            $arraySums[$key] = $arraySums[$key] + $value;
        } else {
            $arraySums[$key] = $value;
        }
    }
}
$stringToShow = implode(" ", $arraySums);
echo $stringToShow;