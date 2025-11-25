<?php

class User
{
    // Свойства (характеристики объекта)
    public $name;
    public $email;
    private $password;

    // Конструктор - вызывается при создании объекта
    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        echo "Пользователь {$this->name} создан!";
    }

    // Методы (действия объекта)
    public function getInfo()
    {
        return "Имя: {$this->name}, Email: {$this->email}";
    }

    public function checkPassword($password)
    {
        return password_verify($password, $this->password);
    }

    // Деструктор - вызывается при удалении объекта
    public function __destruct()
    {
        echo "Пользователь {$this->name} удален из памяти.";
    }
}

// Создание объектов (экземпляров класса)
$user1 = new User("Иван", "ivan@mail.ru", "123456");
$user2 = new User("Мария", "maria@yandex.ru", "qwerty");

// Работа с объектами
echo $user1->getInfo();
echo $user2->getInfo();

// Проверка пароля
if ($user1->checkPassword("123456")) {
    echo "Пароль верный!";
}
