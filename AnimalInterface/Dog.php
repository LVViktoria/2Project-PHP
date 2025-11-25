<?php

require_once 'abstract/Animal.php';

class Dog extends Animal
{
    private $breed;

    public function __construct($name, $age, $breed)
    {
        parent::__construct($name, $age);
        $this->breed = $breed;
    }

    public function sleep()
    {
        return $this->name . " спит на коврике";
    }

    public function makeSound()
    {
        return $this->name . " гавкает: Гав-гав!";
    }

    public function eat($food)
    {
        return $this->name . " ест " . $food;
    }

    public function fetch()
    {
        return $this->name . " приносит палку";
    }

    public function getBreed()
    {
        return $this->breed;
    }
}
?>