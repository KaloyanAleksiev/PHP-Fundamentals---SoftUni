<?php

$string = fgets(STDIN);
$arrayToManipulate = explode(" ", trim($string));
$arrayCommands = array();
do {
    $inputCommand = trim(fgets(STDIN));
    $arrayCommands[] = $inputCommand;
} while ($inputCommand != 'print');

foreach ($arrayCommands as $command) {
    $command = explode(" ", trim($command));

    switch ($command[0]) {
        case 'add':
            array_splice($arrayToManipulate, $command[1], 0, $command[2]);
            break;
        case 'addMany':
            for ($i = 2; $i < count($command); ++$i) {
                array_splice($arrayToManipulate, $command[1] + ($i - 2), 0, $command[$i]);
            }
            break;
        case 'contains':
            if (in_array($command[1], $arrayToManipulate)) {
                echo array_search($command[1], $arrayToManipulate) . PHP_EOL;
            } else {
                echo '-1' . PHP_EOL;
            }
            break;
        case 'remove':
            unset($arrayToManipulate[$command[1]]);
            $arrayToManipulate = array_values($arrayToManipulate);
            break;
        case 'shift':
            for ($i = 0; $i < $command[1]; ++$i) {
                array_push($arrayToManipulate, $arrayToManipulate[0]);
                array_shift($arrayToManipulate);
            }
            break;
        case 'sumPairs':
            $newArrayToManipulate = [];
            for ($i = 0; $i < count($arrayToManipulate); $i = $i + 2) {
                if(array_key_exists($i+1,$arrayToManipulate)){
                    $newArrayToManipulate[] = $arrayToManipulate[$i] + $arrayToManipulate[$i+1];
                }else{
                    $newArrayToManipulate[] = $arrayToManipulate[$i];
                }
            }
            $arrayToManipulate = $newArrayToManipulate;
            break;
        case 'print':
            $stringToShow = '['.implode(', ', $arrayToManipulate).']';
            echo $stringToShow;
            break;
    }
}


//Test
/*
 * 10 29 30 29
 * addMany 1 1 1 1
 * addMany 1 1 1 1
 * add 2 49
 * remove 3
 * remove 3
 * shift 10
 * contains 10
 * contains 1
 * remove 0
 * contains 49
 * print
 * 
 * Output: 8
 */
