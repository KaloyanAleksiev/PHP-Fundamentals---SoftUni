<?php
$string = fgets(STDIN);
$banList = fgets(STDIN);
$arrayBanList = explode(", ", trim($banList));
foreach($arrayBanList as $word){
    $asterix = str_repeat('*', strlen($word));
    $string = str_replace($word, $asterix, $string);
}
echo $string;

