<?php

class DateModifier {

    private $difference;

    public function calculatesTheDifference(string $firstDate, string $secondDate) {
        $firstDate = new DateTime($firstDate);
        $secondDate = new DateTime($secondDate);
        $difference = $firstDate->diff($secondDate);
        $this->difference = $difference->format('%a');
    }
    public function __toString() {
        return $this->difference;
    }
}

$stringFirstDate = str_replace (' ', '-', trim(fgets(STDIN)));
$stringSecondDate = str_replace (' ', '-', trim(fgets(STDIN)));
$modifier = new DateModifier();
$modifier->calculatesTheDifference($stringFirstDate, $stringSecondDate);
echo $modifier;
