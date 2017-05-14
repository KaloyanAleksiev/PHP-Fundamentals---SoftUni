<?php

abstract class Settler {

    private $id;

    protected function __construct($id) {
        $this->setId($id);
    }

    public function getId() {
        return $this->id;
    }

    private function setId(string $id) {
        $this->id = $id;
    }

}

class Citizen extends Settler {

    private $name;
    private $age;

    function __construct(string $name, int $age, string $id) {
        $this->setName($name);
        $this->setAge($age);
        parent::__construct($id);
    }

    private function setName(string $name) {
        $this->name = $name;
    }

    private function setAge(int $age) {
        $this->age = $age;
    }

}

class Robot extends Settler {

    private $model;

    function __construct(string $model, string $id) {
        $this->setModel($model);
        parent::__construct($id);
    }

    private function setModel(string $model) {
        $this->model = $model;
    }

}

$settlers = [];
$end = fgets(STDIN);
while (trim($end) != 'End') {
    $tokens = explode(' ', $end);
    if (array_key_exists(2, $tokens)) {
        $citizen = new Citizen(trim($tokens[0]), intval($tokens[1]), trim($tokens[2]));
        $settlers[] = $citizen;
    } else {
        $robot = new Robot(trim($tokens[0]), trim($tokens[1]));
        $settlers[] = $robot;
    }
    $end = fgets(STDIN);
}
$fakePart = trim(fgets(STDIN));

function isIdFake(Settler $settler, string $fakePart) {
    if (preg_match("/" . $fakePart . "$/", $settler->getId())) {
        echo $settler->getId() . PHP_EOL;
    }
}

foreach ($settlers as $settler) {
    $settler->getId();
    isIdFake($settler, $fakePart);
}