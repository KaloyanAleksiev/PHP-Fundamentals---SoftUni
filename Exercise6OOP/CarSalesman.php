<?php

class Car {

    private $model;
    private $engine;
    private $weight;
    private $color;

    public function __construct(string $model, Engine $engine, $weight = 'n/a', $color = 'n/a') {
        $this->model = $model;
        $this->engine = $engine;
        if (is_numeric($weight)) {
            $this->weight = $weight;
            $this->color = $color;
        } else {
            $this->weight = $color;
            $this->color = $weight;
        }
    }

    public function __toString() {

        return $this->model . ':' . PHP_EOL .
                '  ' . $this->engine->getModel() . ':' . PHP_EOL .
                '    Power: ' . $this->engine->getPower() . PHP_EOL .
                '    Displacement: ' . $this->engine->getDisplacement() . PHP_EOL .
                '    Efficiency: ' . $this->engine->getEfficiency() . PHP_EOL .
                '  Weight: ' . $this->weight . PHP_EOL .
                '  Color: ' . $this->color . PHP_EOL;
    }
    public function __get($model) {
        
    }
    


}

class Engine {

    private $model;
    private $power;
    private $displacement;
    private $efficiency;

    public function __construct(string $model, int $power, $displacement = 'n/a', $efficiency = 'n/a') {

        $this->model = $model;
        $this->power = $power;
        if (is_numeric($displacement)) {
            $this->displacement = $displacement;
            $this->efficiency = $efficiency;
        } else {
            $this->displacement = $efficiency;
            $this->efficiency = $displacement;
        }
    }

    public function getModel() {
        return $this->model;
    }

    public function getPower() {
        return $this->power;
    }

    public function getDisplacement() {
        return $this->displacement;
    }

    public function getEfficiency() {
        return $this->efficiency;
    }

}

$lineForEngine = intval(fgets(STDIN));
$engines = [];
while ($lineForEngine--) {
    $stringEngines = trim(fgets(STDIN));
    $arrayEngines = explode(' ', $stringEngines);
    $modelEngine = $arrayEngines[0];
    $powerEngine = intval($arrayEngines[1]);
    $engine;
    if (isset($arrayEngines[2]) && isset($arrayEngines[3])) {
        $displacement = $arrayEngines[2];
        $efficiency = $arrayEngines[3];
        $engine = new Engine($modelEngine, $powerEngine, $displacement, $efficiency);
    } elseif (isset($arrayEngines[2])) {
        $engine = new Engine($modelEngine, $powerEngine, $arrayEngines[2]);
    } else {
        $engine = new Engine($modelEngine, $powerEngine);
    }
    $engines[$modelEngine] = $engine;
}

$lineForCar = intval(fgets(STDIN));
$cars = [];
while ($lineForCar--) {
    $stringCars = trim(fgets(STDIN));
    $arrayCars = explode(' ', $stringCars);
    $modelCar = $arrayCars[0];
    $engineCar = $engines[$arrayCars[1]];
    $car;
    if (isset($arrayCars[2]) && isset($arrayCars[3])) {
        $weight = $arrayCars[2];
        $color = $arrayCars[3];
        $car = new Car($modelCar, $engineCar, $weight, $color);
    } elseif (isset($arrayCars[2])) {
        $car = new Car($modelCar, $engineCar, $arrayCars[2]);
    } else {
        $car = new Car($modelCar, $engineCar);
    }
    $cars[] = $car;
}

foreach($cars as $car){
    echo $car;
}