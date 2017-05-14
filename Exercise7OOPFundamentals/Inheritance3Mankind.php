<?php

abstract class Humman {

    private $firstName;
    private $lastName;

    protected function __construct(string $firstName, string $lastName) {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    protected function getFirstName() {
        return $this->firstName;
    }

    protected function getLastName() {
        return $this->lastName;
    }

    protected function setFirstName(string $firstName) {
        if (!ctype_upper($firstName[0])) {
            throw new Exception("Expected upper case letter!Argument: firstName");
        }
        if (strlen($firstName) < 4) {
            throw new Exception("Expected length at least 4 symbols!Argument: firstName");
        }
        $this->firstName = $firstName;
    }

    protected function setLastName(string $lastName) {
        if (!ctype_upper($lastName[0])) {
            throw new Exception("Expected upper case letter!Argument: lastName");
        }
        if (strlen($lastName) < 3) {
            throw new Exception("Expected length at least 3 symbols!Argument: lastName");
        }
        $this->lastName = $lastName;
    }

}

class Student extends Humman {

    private $fNumber;

    public function __construct(string $firstName, string $lastName, string $fNumber) {
        parent::__construct($firstName, $lastName);
        $this->setFNumber($fNumber);
    }

    private function setFNumber(string $fNumber) {
        if ((strlen($fNumber) < 5) || (strlen($fNumber) > 10)) {
            throw new Exception("Invalid faculty number!");
        }
        $this->fNumber = $fNumber;
    }

    private function getFNumber() {
        return $this->fNumber;
    }

    public function __toString() {
        return "First Name: " . $this->getFirstName() . PHP_EOL . 
                "Last Name: " . $this->getLastName() . PHP_EOL .
                "Faculty number: " . $this->getFNumber() . PHP_EOL . PHP_EOL;
    }

}

class Worker extends Humman {

    private $weekSalary;
    private $workHoursPerDay;

    public function __construct(string $firstName, string $lastName, float $weekSalary, float $workHoursPerDay) {
        parent::__construct($firstName, $lastName);
        $this->setWeekSalary($weekSalary);
        $this->setWorkHoursPerDay($workHoursPerDay);
    }

    private function setWeekSalary(float $weekSalary) {
        if ($weekSalary <= 10) {
            throw new Exception("Expected value mismatch!Argument: weekSalary");
        }
        $this->weekSalary = $weekSalary;
    }

    private function setWorkHoursPerDay(float $workHoursPerDay) {
        if (($workHoursPerDay < 1) || ($workHoursPerDay > 12)) {
            throw new Exception("Expected value mismatch!Argument: workHoursPerDay");
        }
        $this->workHoursPerDay = $workHoursPerDay;
    }

    protected function setLastName(string $lastName) {
        if (strlen($lastName) <= 3) {
            throw new Exception("Expected length more than 3 symbols!Argument: lastName");
        }
        parent::setLastName($lastName);
    }

    private function getSalaryPerHour() {
        return $this->weekSalary / ($this->workHoursPerDay * 7);
    }

    private function getWeekSalary() {
        return $this->weekSalary;
    }

    private function getWorkHoursPerDay() {
        return $this->workHoursPerDay;
    }

    public function __toString() {
        return "First Name: " . $this->getFirstName() . PHP_EOL .
                "Last Name: " . $this->getLastName() . PHP_EOL .
                "Week Salary: " . number_format($this->getWeekSalary(), 2, '.', '') . PHP_EOL .
                "Hours per day: " . number_format($this->getWorkHoursPerDay(), 2, '.', '') . PHP_EOL .
                "Salary per hour: " . number_format($this->getSalaryPerHour(), 2, '.', '');
    }

}

$firstLine = trim(fgets(STDIN));
$secondLine = trim(fgets(STDIN));
$arrayFirstLine = explode(' ', $firstLine);
$arraySecondLine = explode(' ', $secondLine);
try{
$student = new Student($arrayFirstLine[0], $arrayFirstLine[1], $arrayFirstLine[2]);
$worker = new Worker($arraySecondLine[0], $arraySecondLine[1], $arraySecondLine[2], $arraySecondLine[3]);
echo $student;
echo $worker;
} catch (Exception $exc){
    echo $exc->getMessage();
}