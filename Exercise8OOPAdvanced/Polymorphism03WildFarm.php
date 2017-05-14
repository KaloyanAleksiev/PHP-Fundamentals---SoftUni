<?php

abstract class Food {

    private $quantity;

    public function __construct(int $quantity) {
        $this->setQuantity($quantity);
    }

    private function setQuantity(int $quantity) {
        $this->quantity = $quantity;
    }

    public function getQuantity() {
        return $this->quantity;
    }

}

class Vegetable extends Food {
    
}

class Meat extends Food {
    
}

abstract class Animal {

    protected $animalName;
    protected $animalWeight;
    protected $foodEaten;
    protected $sound;

    protected function __construct(string $animalName, float $animalWeight, int $foodEaten = 0) {
        $this->setAnimalName($animalName);
        $this->setAnimalWeight($animalWeight);
        $this->setFoodEaten($foodEaten);
    }

    private function setAnimalName(string $animalName) {
        $this->animalName = $animalName;
    }

    private function setAnimalWeight(float $animalWeight) {
        $this->animalWeight = $animalWeight;
    }

    private function setFoodEaten(int $foodEaten) {
        $this->foodEaten = $foodEaten;
    }

    public function makeSound() {
        echo $this->sound . PHP_EOL;
    }

    public function eat(Food $food) {
        $this->setFoodEaten($food->getQuantity());
    }

    public function __toString() {
        return get_class($this) . "[{$this->animalName}, {$this->animalWeight}, {$this->foodEaten}]" . PHP_EOL;
    }

}

abstract class Mammal extends Animal {

    protected $animalLivingRegion;

    protected function __construct(string $animalName, float $animalWeight, string $animalLivingRegion, int $foodEaten = 0) {
        parent::__construct($animalName, $animalWeight, $foodEaten);
        $this->setAnimalLivingRegion($animalLivingRegion);
    }

    private function setAnimalLivingRegion($animalLivingRegion) {
        $this->animalLivingRegion = $animalLivingRegion;
    }

    public function __toString() {
        return get_class($this) . "[{$this->animalName}, {$this->animalWeight}, {$this->animalLivingRegion}, {$this->foodEaten}]" . PHP_EOL;
    }

}

abstract class Felime extends Mammal {
    
}

class Mouse extends Mammal {

    public function __construct(string $animalName, float $animalWeight, string $animalLivingRegion, int $foodEaten = 0) {
        parent::__construct($animalName, $animalWeight, $animalLivingRegion, $foodEaten);
        $this->sound = 'SQUEEEAAAK!';
    }

    public function eat(\Food $food) {
        if (get_class($food) != 'Vegetable') {
            throw new Exception('Mouses are not eating that type of food!');
        }
        parent::eat($food);
    }

}

class Zebra extends Mammal {

    public function __construct(string $animalName, float $animalWeight, string $animalLivingRegion, int $foodEaten = 0) {
        parent::__construct($animalName, $animalWeight, $animalLivingRegion, $foodEaten);
        $this->sound = 'Zs';
    }

    public function eat(\Food $food) {
        if (get_class($food) != 'Vegetable') {
            throw new Exception('Zebras are not eating that type of food!');
        }
        parent::eat($food);
    }

}

class Cat extends Felime {

    private $breed;

    public function __construct(string $animalName, float $animalWeight, string $animalLivingRegion, string $breed, int $foodEaten = 0) {
        parent::__construct($animalName, $animalWeight, $animalLivingRegion, $foodEaten);
        $this->setBreed($breed);
        $this->sound = 'Meowwww';
    }

    private function setBreed($breed) {
        $this->breed = $breed;
    }

    public function __toString() {
        return get_class() . "[{$this->animalName}, {$this->breed}, {$this->animalWeight}, {$this->animalLivingRegion}, {$this->foodEaten}]" . PHP_EOL;
    }

}

class Tiger extends Felime {

    public function __construct(string $animalName, float $animalWeight, string $animalLivingRegion, int $foodEaten = 0) {
        parent::__construct($animalName, $animalWeight, $animalLivingRegion, $foodEaten);
        $this->sound = 'ROAAR!!!';
    }

    public function eat(\Food $food) {
        if (get_class($food) != 'Meat') {
            throw new Exception('Tigers are not eating that type of food!');
        }
        parent::eat($food);
    }

}

$line = trim(fgets(STDIN));
while ($line != 'End') {
    $firstLineString = $line;
    $firstLine = explode(' ', $firstLineString);

    $secondLineString = trim(fgets(STDIN));
    $secondLine = explode(' ', $secondLineString);

    $classFood = $secondLine[0];
    $food = new $classFood($secondLine[1]);

    $animal;
    $classAminal = $firstLine[0];

    if ($firstLine[0] == 'Cat') {
        $animal = new $classAminal($firstLine[1], floatval($firstLine[2]), $firstLine[3], $firstLine[4]);
    } else {
        $animal = new $classAminal($firstLine[1], floatval($firstLine[2]), $firstLine[3]);
    }

    if ($animal instanceof Animal && $food instanceof Food) {

        $animal->makeSound();

        try {
            $animal->eat($food);
        } catch (Exception $exc) {
            echo $exc->getMessage() . PHP_EOL;
        }

        echo $animal;
    }
    $line = trim(fgets(STDIN));
}