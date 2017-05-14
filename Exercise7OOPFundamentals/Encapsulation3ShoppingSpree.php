<?php

class Person {

    private $personName;
    private $personMoney;
    private $personBag = [];

    function __construct(string $personName, float $personMoney) {
        $this->setPersonName($personName);
        $this->setPersonMoney($personMoney);
    }

    public function getPersonName() {
        return $this->personName;
    }

    public function getPersonMoney() {
        return $this->personMoney;
    }

    public function getPersonBag(): array {
        return $this->personBag;
    }

    private function setPersonName(string $personName) {
        if (strlen($personName) <= 0) {
            throw new Exception("Name cannot be empty" . PHP_EOL);
        }
        $this->personName = $personName;
    }

    private function setPersonMoney(float $personMoney) {
        if ($personMoney < 0) {
            throw new Exception("Money cannot be negative" . PHP_EOL);
        }
        $this->personMoney = $personMoney;
    }

    public function addToPersonBag(Product $product) {
        if ($this->getPersonMoney() < $product->getProductCost()) {
            throw new Exception($this->getPersonName() . " can't afford " . $product->getProductName() . PHP_EOL);
        }
        $this->setPersonMoney($this->getPersonMoney() - $product->getProductCost());
        $this->personBag[] = $product->getProductName();
    }

}

class Product {

    private $productName;
    private $productCost;

    function __construct(string $productName, float $productCost) {
        $this->setProductName($productName);
        $this->setProductCost($productCost);
    }

    public function getProductName() {
        return $this->productName;
    }

    public function getProductCost() {
        return $this->productCost;
    }

    private function setProductName(string $productName) {
        if (strlen($productName) <= 0) {
            throw new Exception("Name cannot be empty" . PHP_EOL);
        }
        $this->productName = $productName;
    }

    private function setProductCost(float $productCost) {
        if ($productCost < 0) {
            throw new Exception("Money cannot be negative" . PHP_EOL);
        }
        $this->productCost = $productCost;
    }

}

$people = trim(fgets(STDIN));
$arrayPeople = array_filter(explode(';', $people));
$Persons = [];

foreach ($arrayPeople as $person) {
    $arrayPerson = explode('=', $person);
    $personName = $arrayPerson[0];
    $personMoney = $arrayPerson[1];
    try {
        $per = new Person($personName, $personMoney);
        $Persons[] = $per;
    } catch (Exception $exc) {
        echo $exc->getMessage();
    }
}


$products = trim(fgets(STDIN));
$arrayProducts = array_filter(explode(';', $products));
$arrayPro = [];

foreach ($arrayProducts as $product) {
    $arrayProduct = explode('=', $product);
    $productName = $arrayProduct[0];
    $productCost = $arrayProduct[1];
    try {
        $pro = new Product($productName, $productCost);
        $arrayPro[] = $pro;
    } catch (Exception $exc) {
        echo $exc->getMessage();
    }
}

$cmd = trim(fgets(STDIN));
while ($cmd != 'END') {
    $arrayCMD = explode(' ', $cmd);
    $personName = $arrayCMD[0];
    $productName = $arrayCMD[1];
    foreach ($Persons as $person) {
        foreach ($arrayPro as $Product) {
            if (($person->getPersonName() == $personName) && ($Product->getProductName() == $productName)) {
                try {
                    $person->addToPersonBag($Product);
                    echo $person->getPersonName() . ' bought ' . $Product->getProductName() . PHP_EOL;
                } catch (Exception $exc) {
                    echo $exc->getMessage();
                }
            }
        }
    }
    $cmd = trim(fgets(STDIN));
}

foreach ($Persons as $person) {
    $count = count($person->getPersonBag());
    if ($count > 0) {
        echo $person->getPersonName() . ' - ' . implode(',', $person->getPersonBag()) . PHP_EOL;
    } else {
        echo $person->getPersonName() . ' - Nothing bought' . PHP_EOL;
    }
}