<?php

class Box {

    private $length;
    private $width;
    private $height;

    function __construct(float $length, float $width, float $height) {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    private function getLength() {
        return $this->length;
    }

    private function getWidth() {
        return $this->width;
    }

    private function getHeight() {
        return $this->height;
    }

    private function setLength(float $length) {
        $this->length = $length;
    }

    private function setWidth(float $width) {
        $this->width = $width;
    }

    private function setHeight(float $height) {
        $this->height = $height;
    }

    public function getVolume() {
        echo "Volume - " . number_format($this->getLength() * $this->getWidth() * $this->getHeight(), 2,'.', '') . PHP_EOL;
    }

    public function getLateralSurface() {
        echo "Lateral Surface Area - " . number_format((2 * ($this->getLength() * $this->getHeight()) + 2 * ($this->getWidth() * $this->getHeight())), 2,'.', '') . PHP_EOL;
    }

    public function getSurfaceArea() {
        echo "Surface Area - " . number_format((2 * ($this->getLength() * $this->getWidth()) + 2 * ($this->getLength() * $this->getHeight()) + 2 * ($this->getWidth() * $this->getHeight())), 2,'.', '') . PHP_EOL;
    }

}

$l = floatval(fgets(STDIN));
$w = floatval(fgets(STDIN));
$h = floatval(fgets(STDIN));
$box = new Box($l, $w, $h);
$box->getSurfaceArea();
$box->getLateralSurface();
$box->getVolume();