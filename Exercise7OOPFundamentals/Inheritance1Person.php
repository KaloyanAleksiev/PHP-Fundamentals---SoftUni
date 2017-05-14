<?php

class Person {

    protected $name;
    protected $age;

    public function __construct(string $name, int $age) {
        $this->setName($name);
        $this->setAge($age);
    }

    protected function setName($name) {
        if (strlen($name) < 3) {
            throw new Exception('Name’s length should not be less than 3 symbols!');
        }
        $this->name = $name;
    }

    protected function setAge($age) {
        if ($age < 1) {
            throw new Exception('Age must be positive!');
        }
        $this->age = $age;
    }
    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }


}

class Child extends Person {
    protected function setAge($age) {
        if ($age > 15) {
            throw new Exception('Child’s age must be less than 16!');
        }
        parent::setAge($age);
    }
}
$children = [];
try {
    $children[] = new Child('Anq', 12);
} catch (Exception $exc) {
    echo $exc->getMessage();
}

foreach ($children as $child) {
    echo $child->getName() . " " . $child->getAge().PHP_EOL;
}
