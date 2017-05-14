<?php

$text = trim(fgets(STDIN));

preg_match_all('/<a href=\"(?<link>.*?)\">(?<name>.*?)<\/a>/', $text, $matches);

$matchNumber = count($matches[0]);
for ($i = 0; $i < $matchNumber; ++$i) {
    $replacement = '[URL=' . $matches['link'][$i] . ']' . $matches['name'][$i] . '[/URL]';
    $text = str_replace($matches[0][$i], $replacement, $text);
}

echo $text;
