<?php

class Book {

    protected $title;
    protected $author;
    protected $price;

    public function __construct(string $title, string $author, float $price) {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }

    protected function getTitle() {
        return $this->title;
    }

    protected function getAuthor() {
        return $this->author;
    }

    public function getPrice() {
        return $this->price;
    }

    protected function setTitle(string $title) {
        if (strlen($title) < 3) {
            throw new Exception('Title not valid!');
        }
        $this->title = $title;
    }

    protected function setAuthor(string $author) {
        $authorsNames = explode(' ', $author);
        $secondName = $authorsNames[1];
        if (is_numeric($secondName[0])) {
            throw new Exception('Author not valid!');
        }
        $this->author = $author;
    }

    protected function setPrice(float $price) {
        if ($price <= 0) {
            throw new Exception('Price not valid!');
        }
        $this->price = $price;
    }

    public function __toString() {
        return "{$this->title} by {$this->author} on a price of {$this->price}$";
    }

}

class GoldenEditionBook extends Book {

    public function getPrice() {
        $price = parent::getPrice($price) * 1.30;
        return $price;
    }

}

$author = trim(fgets(STDIN));
$title = trim(fgets(STDIN));
$price = floatval(fgets(STDIN));
$bookType = trim(fgets(STDIN));

try {

    if ($bookType == "STANDARD") {
        $book = new Book($title, $author, $price);
    } else if ($bookType == "GOLD") {
        $book = new GoldenEditionBook($title, $author, $price);
    } else {
        throw new Exception("Type is not valid!");
    }

    echo 'OK' . PHP_EOL;
    echo $book->getPrice();
} catch (Exception $e) {

    echo $e->getMessage();
}