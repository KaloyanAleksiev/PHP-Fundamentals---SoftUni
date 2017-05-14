<?php
$numberOne = intval(fgets(STDIN));
$numberTwo = intval(fgets(STDIN));
$numberThree = intval(fgets(STDIN));
$largest = max($numberOne, $numberTwo, $numberThree);
echo "Max: ".$largest;
