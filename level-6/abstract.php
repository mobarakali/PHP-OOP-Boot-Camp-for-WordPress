<?php
abstract class Ainmal{
    // Regular Method
    public function breathe(){
        return "Breathing...\n";
    }

    // Abstruct method (Child must define this)
    abstract public function makeSound();
}

class Dog extends Ainmal{
    public function makeSound()
    {
        return "Woof!\n";
    }
}

$tom = new Dog();
echo $tom->makeSound();
echo $tom->breathe();