<?php
$phraseOne = fgets(STDIN);
$phraseTwo = fgets(STDIN);
$arrayPhraseOne = str_split(trim($phraseOne));
$arrayPhraseTwo = str_split(trim($phraseTwo));
$numberPhraseOne = count($arrayPhraseOne);
$numberPhraseTwo = count($arrayPhraseTwo);
//$theReversedString = strrev($phraseOne);array_reverse
$end = ($numberPhraseOne > $numberPhraseTwo) ? $numberPhraseOne : $numberPhraseTwo; 
$counterLeft = 0;
for($i = 0; $i<$end; ++$i){
    if($arrayPhraseOne[$i] == $arrayPhraseTwo[$i]){
        $counterLeft++;
    }else{
        break;
    }
}
$reversedArrayPhraseOne = array_reverse($arrayPhraseOne);
$reversedArrayPhraseTwo = array_reverse($arrayPhraseTwo);
$counterRight= 0;
for($i = 0; $i<$end; ++$i){
    if($reversedArrayPhraseOne[$i] == $reversedArrayPhraseTwo[$i]){
        $counterRight++;
    }else{
        break;
    }
}
if(($counterLeft != 0) && ($counterLeft >= $counterRight)){
    $arrayCommmonPart = array_slice($arrayPhraseOne,0,$counterLeft);
    $strCommmonPart = implode("", $arrayCommmonPart);
    //echo $strCommmonPart;
    $arrayCommmonPart = explode(" ", trim($strCommmonPart));
    echo count($arrayCommmonPart);
    //echo 'The largest common end is at the left: '.$strCommmonPart;
}elseif(($counterRight != 0) && ($counterRight > $counterLeft)){
    $arrayCommmonPart = array_slice($reversedArrayPhraseOne,0,$counterRight);
    $strCommmonPart = implode("", $arrayCommmonPart);
    $strCommmonPart = strrev($strCommmonPart);
    $arrayCommmonPart = explode(" ", trim($strCommmonPart));
    echo count($arrayCommmonPart);
    //echo 'The largest common end is at the right: '.$strCommmonPart;
}else{
    echo 0;
    //echo 'No common words at the left and right';
}