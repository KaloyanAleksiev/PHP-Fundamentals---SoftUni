<?php

class Car {

    private $speed;
    private $fuel;
    private $fuelEconomy;
    private $totalDistance = 0;
    private $totalTime = 0;

    public function __construct(float $speed, float $fuel, float $fuelEconomy) {
        $this->speed = $speed;
        $this->fuel = $fuel;
        $this->fuelEconomy = $fuelEconomy;
    }

    public function travel($kilomiters) {
        if ($this->fuel < (($this->fuelEconomy / 100) * $kilomiters)) {
            $kilomiters = $this->fuel * (100 / $this->fuelEconomy);
            $this->fuel = 0;
        } else {
            $this->fuel -= ($this->fuelEconomy / 100) * $kilomiters;
        }
        $this->totalDistance += $kilomiters;
        $this->totalTime += $kilomiters / $this->speed;
    }

    public function refuels($liters) {
        $this->fuel += $liters;
    }

    public function distance() {
       return $this->totalDistance;
    }

    public function time() {
        return $this->totalTime;
    }

    public function fuel() {
        return $this->fuel;
    }

}

$car = trim(fgets(STDIN));
$arrayCar = explode(' ', $car);
$speed = floatval($arrayCar[0]);
$fuel = floatval($arrayCar[1]);
$fuelEconomy = floatval($arrayCar[2]);
$car = new Car($speed, $fuel, $fuelEconomy);

$end = trim(fgets(STDIN));
$outputs = [];
while ($end != 'END') {
    $arrayCommand = explode(' ', $end);
    $command = $arrayCommand[0];
    if($command == 'Travel'){
        $car->travel($arrayCommand[1]);
    }elseif ($command == 'Refuel') {
        $car->refuels($arrayCommand[1]);
    }elseif ($command == 'Distance') {
       $outputs[] = 'Total Distance: '.number_format((float)$car->distance(), 1, '.', '');
    }elseif ($command == 'Time'){
        $hours = floor($car->time());
        $miutes = round(($car->time() - $hours)*60);
        $outputs[] = 'Total Time: '.$hours.' hours and '.$miutes.' minutes';
    }elseif ($command == 'Fuel'){
        $outputs[] = 'Fuel left: '.number_format((float)$car->fuel(), 1, '.', '').' liters';
    }
    $end = trim(fgets(STDIN));
}

foreach($outputs as $output){
    echo $output.PHP_EOL;
}