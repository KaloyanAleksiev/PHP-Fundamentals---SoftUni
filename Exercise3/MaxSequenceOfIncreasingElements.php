<?php
$string = fgets(STDIN);
$arraySequence = explode(" ", trim($string));
$arrayLength = count($arraySequence);
$maxLength = 0;
$arrayMaxLength = array();
foreach ($arraySequence as $key => $value) {
    $tempMaxLength = 1;
    for($i=$key + 1; $i<$arrayLength; ++$i){
        if($arraySequence[$i-1] < $arraySequence[$i]){
            $tempMaxLength++;
        } else {
            break;
        }
        if($tempMaxLength>$maxLength){
            $maxLength = $tempMaxLength;
            $arrayMaxLength = array_slice($arraySequence, $key, $maxLength);
        }
    }
}
$stringToShow = implode(" ", $arrayMaxLength);
echo $stringToShow;