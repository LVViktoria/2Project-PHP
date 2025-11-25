<?php

namespace showcase;

class OnlineBookUser extends AbstractUser
{
    // Свойства (характеристики объекта)
    public $name;
    public $email;
    private $password;
    private $ip;

    // Конструктор - вызывается при создании объекта
    public function __construct($name, $email, $password)
    {
        parent::__construct($name, $email, $password);
    }

    public function checkPassword($password)
    {
        return password_verify($password, $this->password);
    }
}

// Создание объектов (экземпляров класса)
$user1 = new self("Иван", "ivan@mail.ru", "123456");
$user2 = new self("Мария", "maria@yandex.ru", "qwerty");

// Работа с объектами
echo $user1->getInfo();
echo $user2->getInfo();

// Проверка пароля
if ($user1->checkPassword("123456")) {
    echo "Пароль верный!";
}
