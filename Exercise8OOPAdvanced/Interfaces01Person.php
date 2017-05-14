<?php

interface Person {

    public function setName(string $name);

    public function setAge(int $age);
}

class Citizen implements Person {

    private $name;
    private $age;

    function __construct(string $name, int $age) {
        $this->setName($name);
        $this->setAge($age);
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setAge(int $age) {
        $this->age = $age;
    }

    private function getName() {
        return $this->name;
    }

    private function getAge() {
        return $this->age;
    }

    public function __toString() {
        return $this->getName() . PHP_EOL . $this->getAge();
    }

}

$name = trim(fgets(STDIN));
$age = intval(fgets(STDIN));

$person = new Citizen($name, $age);
echo $person;
