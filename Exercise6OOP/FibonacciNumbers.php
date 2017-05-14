<?php

class Fibonacci {

    private $fibonachiNumbers = array();

    public function __construct() {
        
    }

    public function getNumbersInRange(int $startPosition, int $endPosition) {
        while ($startPosition < $endPosition) {
            $this->fibonachiNumbers[] = $this->genrateFibonacciNumber($startPosition);
            $startPosition++;
        }
        echo implode(', ', $this->fibonachiNumbers);
    }

    private function genrateFibonacciNumber($startPosition) {
        return round(pow((sqrt(5) + 1) / 2, $startPosition) / sqrt(5));
    }

}

$startPosition = intval(fgets(STDIN));
$endPosition = intval(fgets(STDIN));
$fibonacci = new Fibonacci();
$fibonacci->getNumbersInRange($startPosition, $endPosition);
