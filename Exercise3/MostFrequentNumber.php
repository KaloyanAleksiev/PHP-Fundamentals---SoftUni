<?php
$string = fgets(STDIN);
$arraySequence = explode(" ", trim($string));
$arrayLength = count($arraySequence);
$maxLength = 0;
$mostFrequentNumber = '';
foreach ($arraySequence as $key => $value) {
    $tempMaxLength = 0;
    for ($i = 0; $i < $arrayLength; ++$i) {
        if ($value == $arraySequence[$i]) {
            $tempMaxLength++;
        }
        if ($tempMaxLength > $maxLength) {
            $maxLength = $tempMaxLength;
            $mostFrequentNumber = $value;
        }
    }
}
echo $mostFrequentNumber;
