<?php

interface Settler {

    public function getId();
}

interface liveSettler {

    public function getBirthday();
}

class Citizen implements Settler, liveSettler {

    private $id;
    private $name;
    private $age;
    private $birthday;

    public function __construct(string $name, int $age, string $id, DateTime $birthday) {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthday($birthday);
    }

    private function setName(string $name) {
        $this->name = $name;
    }

    private function setAge(int $age) {
        $this->age = $age;
    }

    public function getId() {
        return $this->id;
    }

    private function setId(string $id) {
        $this->id = $id;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    private function setBirthday(DateTime $birthday) {
        $this->birthday = $birthday;
    }

}

class Robot implements Settler {

    private $id;
    private $model;

    public function __construct(string $model, string $id) {
        $this->setModel($model);
        $this->setId($id);
    }

    private function setModel(string $model) {
        $this->model = $model;
    }

    public function getId() {
        return $this->id;
    }

    private function setId(string $id) {
        $this->id = $id;
    }

}

class Pet implements liveSettler {

    private $name;
    private $birthday;

    public function __construct(string $name, DateTime $birthday) {
        $this->setName($name);
        $this->setBirthday($birthday);
    }

    private function setName(string $name) {
        $this->name = $name;
    }

    private function setBirthday(DateTime $birthday) {
        $this->birthday = $birthday;
    }

    public function getBirthday() {
        return $this->birthday;
    }

}

$settlers = [];
$end = fgets(STDIN);
while (trim($end) != 'End') {
    $tokens = explode(' ', $end);
    $kindOfSettler = trim($tokens[0]);
    //echo $kindOfSettler;
    if ($kindOfSettler == 'Citizen') {
        $citizen = new Citizen(trim($tokens[1]), intval($tokens[2]), trim($tokens[3]), DateTime::createFromFormat('d/m/Y', trim($tokens[4])));
        $settlers[] = $citizen;
    } elseif ($kindOfSettler == 'Robot') {
        $robot = new Robot(trim($tokens[1]), trim($tokens[2]));
        $settlers[] = $robot;
    } else {
        $pet = new Pet(trim($tokens[1]), DateTime::createFromFormat('d/m/Y', trim($tokens[2])));
        $settlers[] = $pet;
    }
    $end = fgets(STDIN);
}

$year = intval(fgets(STDIN));

function birthdaysInSpecificYear(liveSettler $settler, int $year) {
    $settlerYear = $settler->getBirthday();
    if($settlerYear instanceof DateTime){
        if($settlerYear->format('Y') == $year){
            echo $settlerYear->format('d/m/Y').PHP_EOL;
        }
    }
}

foreach ($settlers as $settler) {
    if ($settler instanceof liveSettler) {
        birthdaysInSpecificYear($settler, $year);
    }
}