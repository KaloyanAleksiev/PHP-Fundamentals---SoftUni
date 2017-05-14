<?php
$string = fgets(STDIN);
$arraySequence = explode(" ", trim($string));
$arrayLength = count($arraySequence);
$maxLength = 0;
$lastIndex = -1;
$arrayMaxLength = array();
$arrayPrevious = array();
for($i=0; $i < $arrayLength; ++$i){
    $arrayMaxLength[$i] = 1;
    $arrayPrevious[$i] = -1;
    for($k = 0; $k<=$i-1; ++$k){
        if(($arraySequence[$k] < $arraySequence[$i]) && (($arrayMaxLength[$k] + 1) > $arrayMaxLength[$i])){
            $arrayMaxLength[$i] = $arrayMaxLength[$k] + 1; 
            $arrayPrevious[$i] = $k;
        }
    }
    if($arrayMaxLength[$i] > $maxLength){
        $maxLength = $arrayMaxLength[$i];
        $lastIndex = $i;
    }
    
}
$newArray = array();
while($lastIndex != -1){
    array_push($newArray, $arraySequence[$lastIndex]);
    $lastIndex = $arrayPrevious[$lastIndex];
}
$newArray = array_reverse($newArray);
$stringToShow = implode(" ", $newArray);
echo $stringToShow;