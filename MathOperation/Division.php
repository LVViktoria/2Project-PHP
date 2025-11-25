<?php 
class Division extends MathOperation
{
// Полиморфизм + дополнительная логика
public function calculate()
{
$this->validateNumbers();

if ($this->b == 0) {
throw new InvalidArgumentException("Деление на ноль невозможно");
}

$this->result = $this->a / $this->b;
return $this;
}
}
?>