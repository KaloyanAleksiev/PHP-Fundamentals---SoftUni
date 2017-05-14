<?php

class Number {

    private $number;

    public function __construct(int $number) {
        $this->number = $number;
    }

    public function englishNameOfTheLastDigit() {
        $lastDigit = intval(substr($this->number, -1));
        switch ($lastDigit) {
            case 1:
                echo 'one';
                break;
            case 2:
                echo 'two';
                break;
            case 3:
                echo 'three';
                break;
            case 4:
                echo 'four';
                break;
            case 5:
                echo 'five';
                break;
            case 6:
                echo 'six';
                break;
            case 7:
                echo 'seven';
                break;
            case 8:
                echo 'eight';
                break;
            case 9:
                echo 'nine';
                break;
            case 0:
                echo 'zero';
                break;
            default:
                break;
        }
    }

}

$number = intval(fgets(STDIN));
$theNumber = new Number($number);
$theNumber->englishNameOfTheLastDigit();
