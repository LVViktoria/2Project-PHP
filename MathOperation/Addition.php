<?php // Наследование: класс Addition наследует от MathOperation
class Addition extends MathOperation 
{
// Полиморфизм: переопределяем метод calculate()
public function calculate() {
$this->validateNumbers();
$this->result = $this->a + $this->b;
return $this;
}
}

// Еще одно наследование
class Multiplication extends MathOperation {
// Полиморфизм: тот же метод, но другая реализация
public function calculate() {
$this->validateNumbers();
$this->result = $this->a * $this->b;
return $this;
}
}

// И еще один класс
class Division extends MathOperation {
// Полиморфизм + дополнительная логика
public function calculate() {
$this->validateNumbers();

if ($this->b == 0) {
throw new InvalidArgumentException("Деление на ноль невозможно");
}

$this->result = $this->a / $this->b;
return $this;
}
}
?>