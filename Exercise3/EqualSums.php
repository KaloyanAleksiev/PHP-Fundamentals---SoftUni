<?php
$string = fgets(STDIN);
$arraySequence = explode(" ", trim($string));
$arrayLength = count($arraySequence);
$stringToShow = 'no';
foreach ($arraySequence as $key => $value) {
    $leftSum = 0;
    $rightSum = 0;
    for ($i = 0; $i < $key; ++$i) {
        $leftSum = $leftSum + $arraySequence[$i];
    }
    for ($k = $key+1; $k < $arrayLength; ++$k) {
        $rightSum = $rightSum + $arraySequence[$k];
    }
    if($leftSum == $rightSum){
        $stringToShow = $key;
    }
}
echo $stringToShow;