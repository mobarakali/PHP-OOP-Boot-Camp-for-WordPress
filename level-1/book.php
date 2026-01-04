<?php
class Book {
    public $title;
    public $author;

    public function getSummary(){
        return "{$this-> title} was written by {$this->author}"; 
    }
}

// Step 1: Crate the first object
$book1 = new Book();
$book1->title = "Automic Habits";
$book1->author = "James Clear";

// Step 2: Crate a second object (totally seperate from the first)
$book2 = new Book();
//$book2->title = "The Habit";
$book2->author = "J.R.R. Tolkien";

echo $book1->getSummary();
echo "\n";
echo $book2->getSummary();