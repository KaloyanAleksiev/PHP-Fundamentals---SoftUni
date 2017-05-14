<?php
$string = fgets(STDIN);
$arraySequence = explode(" ", trim($string));
$arrayLength = count($arraySequence);
$maxLength = 0;
$arrayMaxLength = array();
foreach ($arraySequence as $key => $value) {
    $tempMaxLength = 0;
    for($i=$key; $i<$arrayLength; ++$i){
        if($value == $arraySequence[$i]){
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