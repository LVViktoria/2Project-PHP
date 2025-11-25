<?php

class ComputerTimeTracking
{
    private int $daysCount;
    private array $hours;
    private int $totalHours;
    private int $maxHours;

    public function __construct(int $daysCount)
    {
        if ($daysCount <= 0) {
            throw new InvalidArgumentException("Days count must be positive");
        }

        $this->daysCount = $daysCount;
        $this->hours = [];
        $this->totalHours = 0;
        $this->maxHours = 0;
    }

    public function collectData(): void
    {
        for ($i = 1; $i <= $this->daysCount; $i++) {
            echo "Day {$i}: ";
            $input = trim(fgets(STDIN));

            if (!is_numeric($input) || $input < 0) {
                throw new InvalidArgumentException("Invalid hours input for day {$i}");
            }

            $currentHours = (int)$input;
            $this->hours[$i] = $currentHours;
            $this->totalHours += $currentHours;

            if ($currentHours > $this->maxHours) {
                $this->maxHours = $currentHours;
            }
        }
    }

    public function analyze(): void
    {
        // Проверка превышения лимита
        foreach ($this->hours as $day => $dayHours) {
            if ($dayHours > 8) {
                echo "!Attention: on day {$day} there were more than 8 hours" . PHP_EOL;
            }
        }

        // Вывод статистики
        $average = $this->totalHours / $this->daysCount;
        echo sprintf("Average time: %.2f hours" . PHP_EOL, $average);
        echo "Total time: {$this->totalHours} hours" . PHP_EOL;
        echo sprintf("Maximum time: %.2f hours" . PHP_EOL, $this->maxHours);
    }

    public function getDaysCount(): int
    {
        return $this->daysCount;
    }

    public function getTotalHours(): int
    {
        return $this->totalHours;
    }

    public function getMaxHours(): int
    {
        return $this->maxHours;
    }

    public function getHours(): array
    {
        return $this->hours;
    }
}
?>