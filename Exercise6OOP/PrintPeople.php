<?php

class Person {

    private $name;
    private $age;
    private $occupation;

    public function __construct(string $name, int $age, string $occupation) {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function getAge() {
        return $this->age;
    }

    public function __toString() {
        return $this->name . ' - age: ' . $this->age . ', occupation: ' . $this->occupation . PHP_EOL;
    }

}

$end = trim(fgets(STDIN));
$people = [];
while ($end != 'END') {
    $arrayPersons = explode(' ', $end);
    $name = $arrayPersons[0];
    $age = intval($arrayPersons[1]);
    $occupation = $arrayPersons[2];
    $person = new Person($name, $age, $occupation);
    $people[] = $person;
    $end = trim(fgets(STDIN));
}


  usort($people, function (Person $a, Person $b) {
  return $a->getAge() > $b->getAge();
  });

 
/*
function comparePersonByAge(Person $a, Person $b) {
    return $a->getAge() < $b->getAge();
}

function arrayCSF(array $arrayToSort): array {
    $countArrayToSort = count($arrayToSort);
    if ($countArrayToSort > 1) {
        $pivot = $arrayToSort[0];
        $left = $right = array();

        for ($i = 1; $i < $countArrayToSort; $i++) {
            if (comparePersonByAge($arrayToSort[$i], $pivot)) {
                $left[] = $arrayToSort[$i];
            } else {
                $right[] = $arrayToSort[$i];
            }
        }
        return array_merge(arrayCSF($left), array($pivot), arrayCSF($right));
    }
    return $arrayToSort;
}

$people = arrayCSF($people);

*/
foreach ($people as $person) {
    echo $person;
}