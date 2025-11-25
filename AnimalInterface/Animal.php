<?php

require_once 'interfaces/AnimalInterface.php';

abstract class Animal implements AnimalInterface
{
    protected $name;
    protected $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->setAge($age);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        if ($age >= 0) {
            $this->age = $age;
        } else {
            throw new Exception("Возраст не может быть отрицательным");
        }
    }

    abstract public function sleep();

    public function breathe()
    {
        return $this->name . " дышит";
    }
}
?>