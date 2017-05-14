<?php
class DecimalNumber {
    private $digits;
    
    public function __construct(string $digits) {
        $this->digits = $digits;
    }

    public function printAllDigitsInReversedOrder() {
        echo strrev($this->digits);
    }
}

$number = floatval(fgets(STDIN));
$theNumber = new DecimalNumber($number);
$theNumber->printAllDigitsInReversedOrder();