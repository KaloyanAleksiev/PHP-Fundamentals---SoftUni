<?php

interface Car {

    public function useBrakes();

    public function pushTheGas();
}

class Ferrari implements Car {

    const MODEL = '488-Spider';

    private $driver;

    public function __construct(string $driver) {
        $this->setDriver($driver);
    }

    private function getDriver() {
        return $this->driver;
    }

    private function setDriver(string $driver) {
        $this->driver = $driver;
    }

    public function useBrakes() {
        return 'Brakes!';
    }

    public function pushTheGas() {
        return 'Zadu6avam sA!';
    }

    public function __toString() {
        return self::MODEL . '/' . $this->useBrakes() . '/' . $this->pushTheGas() . '/' . $this->getDriver();
    }

}

$driver = fgets(STDIN);

$ferrari = new Ferrari($driver);

echo $ferrari;
