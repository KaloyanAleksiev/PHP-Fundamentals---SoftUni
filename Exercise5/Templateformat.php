<?php

$stringQuestionsAndAnswers = trim(fgets(STDIN));
$arrayQuestionsAndAnswers = explode(', ', $stringQuestionsAndAnswers);

function output(array $arrayQuestionsAndAnswers) {
    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
    $xml .= '<quiz>' . PHP_EOL;
    $numberOfQandA = count($arrayQuestionsAndAnswers);
    for ($i = 0; $i < $numberOfQandA; $i = $i + 2) {
        $question = $arrayQuestionsAndAnswers[$i];
        $answer = $arrayQuestionsAndAnswers[$i + 1];
        $xml .= '  <question>' . PHP_EOL;
        $xml .= '    ' . $question . PHP_EOL;
        $xml .= '  </question>' . PHP_EOL;
        $xml .= '  <answer>' . PHP_EOL;
        $xml .= '    ' . $answer . PHP_EOL;
        $xml .= '  </answer>' . PHP_EOL;
    }
    $xml .= '</quiz>';
    echo $xml;
}

output($arrayQuestionsAndAnswers);
