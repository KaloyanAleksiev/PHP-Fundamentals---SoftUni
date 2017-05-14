<?php

class Person {

    private $name;
    private $company = NULL;
    private $car = NULL;
    private $parents = [];
    private $chidlren = [];
    private $pokemons = [];

    public function __construct(string $name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }

        public function company(string $companyName, string $department, float $salary) {
        $this->company = new class($companyName, $department, $salary) extends Person{
        private $companyName;
        private $department;
        private $salary;

        function __construct(string $companyName, string $department, float $salary) {
            $this->companyName = $companyName;
            $this->department = $department;
            $this->salary = $salary;
        }

        function __toString(): string {
            $salary = number_format($this->salary, 2);
            return "{$this->name} {$this->department} {$salary}";
        }

        };
    }
    

}

class Outer {

    private $prop = 1;
    protected $prop2 = 2;

    protected function func1() {
        return 3;
    }

    public function func2() {
        return new class($this->prop) extends Outer {
        private $prop3;

        function __construct($prop) {
            $this->prop3 = $prop;
        }

        function func3() {
            return $this->prop2 + $this->prop3 + $this->func1();
        }

        }

        ;
    }

}

$other = new Outer();
$func2 = 'func2';
echo $other->$func2()->func3();
echo (new Outer)->func2()->func3();
