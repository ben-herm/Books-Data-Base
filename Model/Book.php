<?php

class Book {

    public $bookName;
    public $author;
    public $price;
    public $id;

    public function __construct($bookName, $author, $price) {
        $this->bookName = $bookName;
        $this->author = $author;
        $this->price = $price;
    }

}
