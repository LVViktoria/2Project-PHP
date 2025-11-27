<?php
require_once 'Cart.php';

$cart = new Cart();

echo "Добавляем товары в корзину...\n";
$cart->addItem("Ноутбук", 999.99);
$cart->addItem("Мышь", 25.50);
$cart->addItem("Клавиатура", 75.25);


$cart->display();

echo "\nДобавляем еще товаров...\n";
$cart->addItem("Монитор", 199.99);
$cart->addItem("Наушники", 49.99);

$cart->display();

$total = $cart->getTotal();
echo "\nПроверка общей суммы: \${$total}\n";
?>