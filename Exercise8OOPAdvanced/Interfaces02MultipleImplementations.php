<?php

interface Person {

    public function setName(string $name);

    public function setAge(int $age);
}

interface Identifiable {

    public function setId(string $id);
}

interface Birthable {

    public function setBirthdate(string $birthdate);
}

class Citizen implements Person, Identifiable, Birthable {

    private $name;
    private $age;
    private $id;
    private $birthdate;

    function __construct(string $name, int $age, string $id, string $birthdate) {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthdate($birthdate);
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    private function getName() {
        return $this->name;
    }

    public function setAge(int $age) {
        $this->age = $age;
    }

    private function getAge() {
        return $this->age;
    }

    public function setId(string $id) {
        $this->id = $id;
    }

    private function getId() {
        return $this->id;
    }

    public function setBirthdate(string $birthdate) {
        $this->birthdate = $birthdate;
    }

    private function getBirthdate() {
        return $this->birthdate;
    }

    public function __toString() {
        return $this->getName() . PHP_EOL . $this->getAge() . PHP_EOL . $this->getId() . PHP_EOL . $this->getBirthdate();
    }

}

$name = trim(fgets(STDIN));
$age = intval(fgets(STDIN));
$id = trim(fgets(STDIN));
$birthdate = trim(fgets(STDIN));

$person = new Citizen($name, $age, $id, $birthdate);
echo $person;
