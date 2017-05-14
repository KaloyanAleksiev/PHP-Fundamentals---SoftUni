<?php
$string = fgets(STDIN);
$string = strtolower($string);
$arraySequence = str_split(trim($string));
$arrayKeys = range('a', 'z');
foreach ($arraySequence as $key => $value) {
   $index = array_search($value, $arrayKeys);
   echo $value.' -> '.$index.PHP_EOL;
}