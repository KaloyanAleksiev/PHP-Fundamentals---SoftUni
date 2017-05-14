<?php

class Person {

    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

}

class Family {

    private $family = array();

    public function __construct() {//array $family = array()
        //$this->family = $family;
    }

    public function addMember(Person $person) {
         $this->family[] = $person;
    }

    public function getOldestMember() {
        $persons = $this->family;
        usort ( $persons, function(Person $a, Person $b){
            return $a->getAge() < $b->getAge();
        });
        echo $persons[0]->getName().' ' . $persons[0]->getAge();
    }

}

$lines = intval(fgets(STDIN));
$family = new Family;
while($lines--){
    $stringPersons = trim(fgets(STDIN));
    $arrayPersons = explode(' ', $stringPersons);
    $name = $arrayPersons[0];
    $age = $arrayPersons[1];
    $person = new Person($name, $age);
    $family->addMember($person);
}

$family->getOldestMember();