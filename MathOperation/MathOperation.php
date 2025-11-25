<?php
require_once 'Addition.php';
// Абстрактный класс - это "шаблон" для других классов
abstract class MathOperation
{
    protected $a;
    protected $b;
    protected $result;

    // Конструктор - инициализирует переменные
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
        $this->result = null;
    }

    // Абстрактный метод - должен быть реализован в дочерних классах
    abstract public function calculate();

    // Инкапсуляция: защищенный метод, доступный только внутри класса
    protected function validateNumbers()
    {
        if (!is_numeric($this->a) || !is_numeric($this->b)) {
            throw new InvalidArgumentException("a и b должны быть числами");
        }
    }

    // Инкапсуляция: публичный метод для получения результата
    public function getResult()
    {
        if ($this->result === null) {
            $this->calculate();
        }
        return $this->result;
    }

    // Геттеры (инкапсуляция) - контролируемый доступ к переменным
    public function getA()
    {
        return $this->a;
    }

    public function getB()
    {
        return $this->b;
    }
}
$a = 10;
$b = 5;

echo "a = $a, b = $b\n\n";

// Полиморфизм: разные объекты, одинаковый интерфейс
$operations = [
    new Addition($a, $b),
    new Multiplication($a, $b),
    new Division($a, $b)
];

foreach ($operations as $operation) {
    // Инкапсуляция: мы не знаем КАК вычисляется результат, знаем ЧТО получаем
    $className = get_class($operation);
    $result = $operation->getResult();

    echo "$className: $a и $b = $result\n";
}

echo "\n--- Демонстрация инкапсуляции ---\n";

$add = new Addition(15, 3);

// Мы можем получить доступ к переменным только через геттеры
echo "a = " . $add->getA() . "\n";        
echo "b = " . $add->getB() . "\n";    

echo "Результат: " . $add->getResult() . "\n";
?>