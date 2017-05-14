<?php

class Employee {

    private $name;
    private $salary;
    private $position;
    private $department;
    private $email;
    private $age;

    public function __construct(string $name, float $salary, string $position, string $department, string $email = 'n/a', $age = -1) {
        $this->name = $name;
        $this->salary = $salary;
        $this->position = $position;
        $this->department = $department;
        $this->email = $email;
        $this->age = $age;
    }

    function getName() {
        return $this->name;
    }

    function getSalary() {
        return $this->salary;
    }

    function getPosition() {
        return $this->position;
    }

    function getDepartment() {
        return $this->department;
    }

    function getEmail() {
        return $this->email;
    }

    function getAge() {
        return $this->age;
    }

}

$lines = intval(trim(fgets(STDIN)));
$arrayEmployees = [];
for ($i = 0; $i < $lines; ++$i) {
    $stringEmployee = trim(fgets(STDIN));
    $arrayEmployee = explode(' ', $stringEmployee);

    $name = $arrayEmployee[0];
    $salary = floatval($arrayEmployee[1]);
    $position = $arrayEmployee[2];
    $department = $arrayEmployee[3];

    if ((isset($arrayEmployee[4]) && (isset($arrayEmployee[5])))) {
        $email = $arrayEmployee[4];
        $age = intval($arrayEmployee[5]);
        $employee = new Employee($name, $salary, $position, $department, $email, $age);
        $arrayEmployees[] = $employee;
    } elseif (isset($arrayEmployee[4])) {
        if (is_numeric($arrayEmployee[4])) {
            $age = intval($arrayEmployee[4]);
            $employee = new Employee($name, $salary, $position, $department, 'n/a', $age);
            $arrayEmployees[] = $employee;
        } else {
            $email = $arrayEmployee[4];
            $employee = new Employee($name, $salary, $position, $department, $email);
            $arrayEmployees[] = $employee;
        }
    } else {
        $employee = new Employee($name, $salary, $position, $department);
        $arrayEmployees[] = $employee;
    }
}

$departmentsSalaries = [];
$countSalaries = [];
foreach ($arrayEmployees as $employee) {
    if (array_key_exists($employee->getDepartment(), $departmentsSalaries)) {
        $departmentsSalaries[$employee->getDepartment()] = $departmentsSalaries[$employee->getDepartment()] + $employee->getSalary();
        $countSalaries[$employee->getDepartment()] ++;
    } else {
        $departmentsSalaries[$employee->getDepartment()] = $employee->getSalary();
        $countSalaries[$employee->getDepartment()] = 1;
    }
}

$averageDepartmentSalaries = [];
foreach ($departmentsSalaries as $key => $value) {
    $averageDepartmentSalaries[$key] = $departmentsSalaries[$key] / $countSalaries[$key];
}

$highestAverageSalary = max($averageDepartmentSalaries);
$departmentWithHighestAverageSalary = array_search($highestAverageSalary, $averageDepartmentSalaries);
echo 'Highest Average Salary: ' . $departmentWithHighestAverageSalary . PHP_EOL;

$arrayEmployeesInDepartment = array();
foreach ($arrayEmployees as $employee) {
    if (trim($employee->getDepartment()) == trim($departmentWithHighestAverageSalary)) {
        $arrayEmployeesInDepartment[] = $employee;
    }
}

usort($arrayEmployeesInDepartment, function(Employee $a, Employee $b) {
    return $a->getSalary() < $b->getSalary();
});

foreach ($arrayEmployeesInDepartment as $employee) {
    echo $employee->getName() . ' ' . number_format($employee->getSalary(), 2) . ' ' . $employee->getEmail() . ' ' . $employee->getAge() . PHP_EOL;
}
