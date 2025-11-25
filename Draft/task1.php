<?php

// ===== ИНТЕРФЕЙС =====
// Определяет контракт, который должны реализовать классы
interface AnimalInterface
{
    public function makeSound();
    public function eat($food);
}

// ===== АБСТРАКТНЫЙ КЛАСС =====
// Содержит общую логику для родственных классов
abstract class Animal implements AnimalInterface
{
    protected $name;
    protected $age;

    // Конструктор - демонстрация ИНКАПСУЛЯЦИИ
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->setAge($age);
    }

    // Инкапсуляция: защищаем данные через методы доступа
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

    // Абстрактный метод - должен быть реализован в дочерних классах
    abstract public function sleep();

    // Общий метод для всех животных
    public function breathe()
    {
        return $this->name . " дышит";
    }
}

// ===== НАСЛЕДОВАНИЕ =====
// Класс Dog наследует от Animal
class Dog extends Animal
{
    private $breed;

    public function __construct($name, $age, $breed)
    {
        parent::__construct($name, $age); // Вызов родительского конструктора
        $this->breed = $breed;
    }

    // ПОЛИМОРФИЗМ: реализация абстрактного метода
    public function sleep()
    {
        return $this->name . " спит на коврике";
    }

    // ПОЛИМОРФИЗМ: реализация методов интерфейса
    public function makeSound()
    {
        return $this->name . " гавкает: Гав-гав!";
    }

    public function eat($food)
    {
        return $this->name . " ест " . $food;
    }

    // Специфический метод только для собак
    public function fetch()
    {
        return $this->name . " приносит палку";
    }

    public function getBreed()
    {
        return $this->breed;
    }
}

// ===== НАСЛЕДОВАНИЕ =====
// Класс Cat наследует от Animal
class Cat extends Animal
{
    private $color;

    public function __construct($name, $age, $color)
    {
        parent::__construct($name, $age);
        $this->color = $color;
    }

    // ПОЛИМОРФИЗМ: другая реализация того же метода
    public function sleep()
    {
        return $this->name . " спит на диване";
    }

    // ПОЛИМОРФИЗМ: реализация методов интерфейса
    public function makeSound()
    {
        return $this->name . " мяукает: Мяу-мяу!";
    }

    public function eat($food)
    {
        return $this->name . " нежно ест " . $food;
    }

    // Специфический метод только для кошек
    public function climb()
    {
        return $this->name . " лазает по деревьям";
    }

    public function getColor()
    {
        return $this->color;
    }
}

// ===== ДЕМОНСТРАЦИЯ РАБОТЫ =====

echo "=== ДЕМОНСТРАЦИЯ ООП В PHP ===\n\n";

// Создаем объекты
$dog = new Dog("Бобик", 3, "Лабрадор");
$cat = new Cat("Мурка", 2, "рыжий");

// Демонстрация ИНКАПСУЛЯЦИИ
echo "1. ИНКАПСУЛЯЦИЯ:\n";
echo "Собака: " . $dog->getName() . ", возраст: " . $dog->getAge() . " года\n";
echo "Кошка: " . $cat->getName() . ", возраст: " . $cat->getAge() . " года\n";

// Безопасное изменение возраста через метод
$dog->setAge(4);
echo "Бобику теперь: " . $dog->getAge() . " года\n\n";

// Демонстрация НАСЛЕДОВАНИЯ
echo "2. НАСЛЕДОВАНИЕ:\n";
echo "Общий метод breathe(): " . $dog->breathe() . "\n";
echo "Общий метод breathe(): " . $cat->breathe() . "\n\n";

// Демонстрация ПОЛИМОРФИЗМА
echo "3. ПОЛИМОРФИЗМ:\n";

// Массив животных - разные типы, но общий интерфейс
$animals = [$dog, $cat];

foreach ($animals as $animal) {
    echo $animal->makeSound() . "\n";
    echo $animal->eat("корм") . "\n";
    echo $animal->sleep() . "\n";
    echo "---\n";
}

// Демонстрация АБСТРАКЦИИ
echo "4. АБСТРАКЦИЯ:\n";
echo "Мы работаем с животными на высоком уровне,\n";
echo "не задумываясь о внутренней реализации методов\n\n";

// Демонстрация специфических методов
echo "5. УНИКАЛЬНЫЕ МЕТОДЫ:\n";
echo $dog->fetch() . "\n";
echo $cat->climb() . "\n\n";

// Демонстрация работы с интерфейсом
echo "6. РАБОТА С ИНТЕРФЕЙСОМ:\n";

function animalCare(AnimalInterface $animal)
{
    echo "Уход за животным:\n";
    echo "- " . $animal->makeSound() . "\n";
    echo "- " . $animal->eat("специальный корм") . "\n";
}

animalCare($dog);
animalCare($cat);
