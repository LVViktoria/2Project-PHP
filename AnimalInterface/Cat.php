<?php

require_once 'abstract/Animal.php';

class Cat extends Animal
{
    private $color;

    public function __construct($name, $age, $color)
    {
        parent::__construct($name, $age);
        $this->color = $color;
    }

    public function sleep()
    {
        return $this->name . " спит на диване";
    }

    public function makeSound()
    {
        return $this->name . " мяукает: Мяу-мяу!";
    }

    public function eat($food)
    {
        return $this->name . " ест " . $food;
    }

    public function climb()
    {
        return $this->name . " лазает по деревьям";
    }

    public function getColor()
    {
        return $this->color;
    }
}
