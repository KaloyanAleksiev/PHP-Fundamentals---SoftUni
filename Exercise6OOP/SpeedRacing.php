<?php

class Car {

    private $model;
    private $fuelAmount;
    private $fuelCost;
    private $distanceTravelled;

    public function __construct($model, $fuelAmount, $fuelCost) {
        $this->model = $model;
        $this->fuelAmount = $fuelAmount;
        $this->fuelCost = $fuelCost;
        $this->distanceTravelled = 0;
    }

    public function getModel() {
        return $this->model;
    }

    public function getFuelAmount() {
        return $this->fuelAmount;
    }

    public function getFuelCost() {
        return $this->fuelCost;
    }

    public function getDistanceTravelled() {
        return $this->distanceTravelled;
    }

    public function Drive(float $km) {
        $cost = $km * $this->fuelCost;
        if (round($cost, 2) > round($this->fuelAmount, 2)) {
            throw new Exception('Insufficient fuel for the drive');
        }
        $this->fuelAmount -= $cost;
        $this->distanceTravelled += $km;
    }

}

$lines = intval(trim(fgets(STDIN)));
$arrayCarsObjects = [];
for ($i = 0; $i < $lines; ++$i) {
    $stringCars = trim(fgets(STDIN));
    $arrayCars = explode(' ', $stringCars);
    $model = $arrayCars[0];
    $fuelAmount = floatval($arrayCars[1]);
    $fuelCost = floatval($arrayCars[2]);

    $car = new Car($model, $fuelAmount, $fuelCost);
    $arrayCarsObjects[$model] = $car;
}

$drives = trim(fgets(STDIN));
while ($drives != 'End') {
    $arrayCarDrive = explode(' ', $drives);
    $model = $arrayCarDrive[1];
    $km = floatval($arrayCarDrive[2]);

    $car = $arrayCarsObjects[$model];
    try {
        $car->Drive($km);
    } catch (Exception $exc) {
        echo $exc->getMessage() . PHP_EOL;
    }
    $drives = trim(fgets(STDIN));
}

foreach ($arrayCarsObjects as $car) {
    echo $car->getModel() . ' ' . number_format(abs($car->getFuelAmount()), 2) . ' ' . $car->getDistanceTravelled() . PHP_EOL;
}