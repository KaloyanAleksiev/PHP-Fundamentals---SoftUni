<?php

interface Calling {

    public function callToOtherPhones(string $number);
}

interface Browsing {

    public function browsingInWWW(string $URL);
}

class Smartphone implements Calling, Browsing {

    public function browsingInWWW(string $URL) {
        if (preg_match('/[0-9]/', $URL) != 0) {
            throw new Exception("Invalid URL!" . PHP_EOL);
        }
        echo 'Browsing: ' . $URL . '!' . PHP_EOL;
    }

    public function callToOtherPhones(string $number) {
        if (!ctype_digit($number)) {
            throw new Exception("Invalid number!" . PHP_EOL);
        }
        echo 'Calling... ' . $number . PHP_EOL;
    }

}

$numbers = fgets(STDIN);
$arrayNumbers = explode(' ', $numbers);
$urls = fgets(STDIN);
$arrayURLs = explode(' ', $urls);
$smartphone = new Smartphone();
foreach ($arrayNumbers as $number) {
    try {
        $smartphone->callToOtherPhones(trim($number));
    } catch (Exception $exc) {
        echo $exc->getMessage();
    }
}

foreach ($arrayURLs as $URL) {
    try {
        $smartphone->browsingInWWW(trim($URL));
    } catch (Exception $exc) {
        echo $exc->getMessage();
    }
}
