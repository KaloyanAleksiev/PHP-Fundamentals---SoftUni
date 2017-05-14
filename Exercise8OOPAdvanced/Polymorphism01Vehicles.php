<?php

interface Vehicle {

    public function driving(float $distance);

    public function refueling(float $liters);

    public function getFuelQuantity();
}

class Car implements Vehicle {

    private $fuelQuantity;
    private $fuelConsumption;

    public function __construct(float $fuelQuantity, float $fuelConsumption) {
        $this->setFuelQuantity($fuelQuantity);
        $this->setFuelConsumption($fuelConsumption);
    }

    public function driving(float $distance) {
        $maxDistance = $this->getFuelQuantity() / $this->getFuelConsumption();
        if ($maxDistance >= $distance) {
            $this->setFuelQuantity($this->getFuelQuantity() - ($distance * $this->getFuelConsumption()));
            echo 'Car travelled ' . $distance . ' km' . PHP_EOL;
        } else {
            echo 'Car needs refueling' . PHP_EOL;
        }
    }

    public function refueling(float $liters) {
        $this->fuelQuantity += $liters;
    }

    private function setFuelQuantity(float $fuelQuantity) {
        $this->fuelQuantity = $fuelQuantity;
    }

    private function setFuelConsumption(float $fuelConsumption) {
        $this->fuelConsumption = $fuelConsumption + 0.9;
    }

    public function getFuelQuantity() {
        return $this->fuelQuantity;
    }

    private function getFuelConsumption() {
        return $this->fuelConsumption;
    }

}

class Truck implements Vehicle {

    private $fuelQuantity;
    private $fuelConsumption;

    public function __construct(float $fuelQuantity, float $fuelConsumption) {
        $this->setFuelQuantity($fuelQuantity);
        $this->setFuelConsumption($fuelConsumption);
    }

    public function driving(float $distance) {
        $maxDistance = $this->getFuelQuantity() / $this->getFuelConsumption();
        if ($maxDistance >= $distance) {
            $this->setFuelQuantity($this->getFuelQuantity() - ($distance * $this->getFuelConsumption()));
            echo 'Truck travelled ' . $distance . ' km' . PHP_EOL;
        } else {
            echo 'Truck needs refueling' . PHP_EOL;
        }
    }

    public function refueling(float $liters) {
        $this->fuelQuantity += $liters * (95 / 100);
    }

    private function setFuelQuantity(float $fuelQuantity) {
        $this->fuelQuantity = $fuelQuantity;
    }

    private function setFuelConsumption(float $fuelConsumption) {
        $this->fuelConsumption = $fuelConsumption + 1.6;
    }

    public function getFuelQuantity() {
        return $this->fuelQuantity;
    }

    private function getFuelConsumption() {
        return $this->fuelConsumption;
    }

}

//$vehicles = [];
$firstLine = trim(fgets(STDIN));
$arrayFirstLine = explode(' ', $firstLine);
$car = new Car($arrayFirstLine[1], $arrayFirstLine[2]);

$secondLine = trim(fgets(STDIN));
$arraySecondLine = explode(' ', $secondLine);
$truck = new Truck($arraySecondLine[1], $arraySecondLine[2]);

$end = intval(fgets(STDIN));
while ($end--) {
    $string = trim(fgets(STDIN));
    $tokens = explode(' ', $string);
    $command = trim($tokens[0]);
    $vehicle = trim($tokens[1]);
    if ($command == 'Drive') {
        if ($vehicle == 'Car') {
            $car->driving($tokens[2]);
            //var_dump($car);
        } else {
            $truck->driving($tokens[2]);
            //var_dump($truck);
        }
    } else {
        if ($vehicle == 'Car') {
            $car->refueling($tokens[2]);
            //var_dump($car);
        } else {
            $truck->refueling($tokens[2]);
            //var_dump($truck);
        }
    }
}
//$vehicles[] = $car;
//$vehicles[] = $truck;

echo 'Car: ' . number_format($car->getFuelQuantity(), 2, '.', '') . PHP_EOL;
echo 'Truck: ' . number_format($truck->getFuelQuantity(), 2, '.', '') . PHP_EOL;
