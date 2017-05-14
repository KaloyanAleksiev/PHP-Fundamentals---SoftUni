<?php

class Person {

    private $name;
    private $age;

    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }

    function getName() {
        return $this->name;
    }

    function getAge() {
        return $this->age;
    }

}

$lines = intval(trim(fgets(STDIN)));
$personS = [];
for ($i = 0; $i < $lines; ++$i) {
    $nameAndAge = trim(fgets(STDIN));
    $arrayNameAndAge = explode(' ', $nameAndAge);
    if (intval($arrayNameAndAge[1]) > 30) {
        $person = new Person($arrayNameAndAge[0], intval($arrayNameAndAge[1]));
        $personS[] = $person;
    }
}
usort($personS, function($a, $b) {
    return strcmp($a->getName(), $b->getName());
});
foreach ($personS as $person) {
    echo $person->getName() . ' - ' . $person->getAge() . PHP_EOL;
}
