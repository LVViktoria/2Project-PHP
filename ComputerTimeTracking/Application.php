<?php

require_once 'ComputerTimeTracking.php';

class Application
{
    public function run(): void
    {
        try {
            echo "How many days to count? ";
            $daysCount = trim(fgets(STDIN));

            if (!is_numeric($daysCount) || $daysCount <= 0) {
                throw new InvalidArgumentException("Please enter a valid positive number");
            }

            $analyzer = new ComputerTimeTracking ((int)$daysCount);
            $analyzer->collectData();
            $analyzer->analyze();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage() . PHP_EOL;
            exit(1);
        }
    }
}
?>