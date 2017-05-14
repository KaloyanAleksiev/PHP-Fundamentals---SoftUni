<?php
$word = fgets(STDIN);
$letters = str_split(trim($word));
$end = count($letters);
$newArray = array();
for ($i = 0; $i < $end; ++$i) {
    if (!array_key_exists($letters[$i], $newArray)) {
        $newArray[$letters[$i]] = 0;
    }
    $newArray[$letters[$i]]++;
}
arsort($newArray);
foreach ($newArray as $key => $value) {
    echo $key.'->'.$value. PHP_EOL;
}