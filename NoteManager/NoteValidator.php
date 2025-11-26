<?php

class NoteValidator
{
    private int $minNoteLength = 1;
    private int $maxNoteLength = 100;
    private array $forbiddenCharacters = ['<', '>', '{', '}', 'script'];

    public function validateNote(string $note): array
    {
        $errors = [];

        // Проверка на пустоту
        if (empty(trim($note))) {
            $errors[] = "Note cannot be empty or contain only spaces";
        }

        // Проверка минимальной длины
        if (strlen($note) < $this->minNoteLength) {
            $errors[] = "Note must be at least {$this->minNoteLength} character(s)";
        }

        // Проверка максимальной длины
        if (strlen($note) > $this->maxNoteLength) {
            $errors[] = "Note cannot exceed {$this->maxNoteLength} characters";
        }

        // Проверка запрещенных символов
        foreach ($this->forbiddenCharacters as $char) {
            if (str_contains($note, $char)) {
                $errors[] = "Note contains forbidden character: '{$char}'";
                break;
            }
        }

        return $errors;
    }

    public function validateNumberOfNotes(int $number): array
    {
        $errors = [];

        if ($number <= 0) {
            $errors[] = "Number of notes must be positive";
        }

        if ($number > 100) {
            $errors[] = "Cannot create more than 100 notes at once";
        }

        return $errors;
    }

    // Геттеры для конфигурации
    public function getMaxNoteLength(): int
    {
        return $this->maxNoteLength;
    }

    public function getMinNoteLength(): int
    {
        return $this->minNoteLength;
    }
}
?>