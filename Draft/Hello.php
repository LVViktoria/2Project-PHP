<?php
class Person
{
    public $name = "Undefined", $age = 18;

    function displayInfo()
    {
        echo "Name: $this->name; Age: $this->age<br>";
    }
}
$tom = new Person();
$tom->name = "Tom";
$tom->displayInfo();

$bob = new Person();
$bob->name = "Bob";
$bob->age = 25;
$bob->displayInfo();
