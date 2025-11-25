<?php 
class Multiplication extends MathOperation
{
// Полиморфизм: тот же метод, но другая реализация
public function calculate()
{
$this->validateNumbers();
$this->result = $this->a * $this->b;
return $this;
}
}?>