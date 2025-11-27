<?php
/*
TODO: Создать класс Cart, представляющий корзину интернет-магазина.
Он должен уметь добавлять товары, выводить список и считать общую стоимость.
Возможности для расширения: добавить систему скидок и типизацию товаров.
 */


class Cart
{
    private array $items;
    public function __construct()
    {
        $this->items = [];
    }
    public function addItem(string $name, float $price): void
    {
        $this->items[] = [
            'name' => $name,
            'price' => $price
        ];
    }
    public function getTotal(): float
    {
        $total = 0.0;
        foreach ($this->items as $item) {
            $total += $item['price'];
        }

        return $total;
    }
    public function display(): void
    {
        echo "=== КОРЗИНА ПОКУПОК ===\n";

        if (empty($this->items)) {
            echo "Корзина пуста\n";
        } else {
            echo "Список товаров:\n";

            foreach ($this->items as $index => $item) {
                $number = $index + 1;
                echo "{$number}. {$item['name']} - \${$item['price']}\n";
            }
            $total = $this->getTotal();
            echo "-------------------\n";
            echo "Общая сумма: \${$total}\n";
        }

        echo "=====================\n";
    }
}
?>
