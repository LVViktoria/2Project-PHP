<?php

namespace showcase;

class LibraryUser extends AbstractUser
{
    // Свойства (характеристики объекта)
    private $address;
    private $password;

    // Конструктор - вызывается при создании объекта
    public function __construct($name, $email, $password, $address)
    {
        parent::__construct($name, $email, $password);

        $this->password = $password;
        $this->address = $address;
    }

    public function checkPassword($password)
    {
        LibraryUser::getAddress();
        $password + 'qwerty';
        return password_verify($password, $this->password);
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }


    public function __destruct()
    {
        return parent::__destruct();
    }
}

function countJopa() {
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
}