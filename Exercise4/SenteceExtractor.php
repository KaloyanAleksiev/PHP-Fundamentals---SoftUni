<?php

$string = fgets(STDIN);
$theWord = trim(fgets(STDIN));
$string = str_replace('?', "? | ", $string);
$string = str_replace('.', ". | ", $string);
$string = str_replace('!', "! | ", $string);
$arrayOfSentences = explode(' | ', $string);
$controlOutput = 0;
foreach ($arrayOfSentences as $sentence) {
    $controlOutput++;
    if ($controlOutput == count($arrayOfSentences)) {
        break;
    }
    if (preg_match('/\b' . $theWord . '[\s|!?.,]/', trim($sentence))) {
        echo trim($sentence) . PHP_EOL;
    }
}