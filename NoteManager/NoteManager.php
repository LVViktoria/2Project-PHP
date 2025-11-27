<?php
require_once 'NoteValidator.php';
class NoteManager
{
    private array $notes = [];
    private NoteValidator $validator; //Добавлено свойство валидатора
    private int $maxNotes = 100;

    public function __construct(NoteValidator $validator=null
                            )//Добавлен параметр $validator с значением по умолчанию
    {
        $this->validator = $validator ?? new NoteValidator();
    }

    public function addNote(string $note): array
    {
        $errors = $this->validator->validateNote($note);

        if (empty($errors)) {
            $this->notes[] = $note;
        }

        return $errors;
    }

    public function inputNotes(int $numberOfNotes): array
    {

        $allErrors = [];
        for ($i = 0; $i < $numberOfNotes && $i < $this->maxNotes; $i++) {
            echo "Note " . ($i + 1) . ": \n";
            $note = trim(fgets(STDIN));
            $errors = $this->addNote($note);
            if (!empty($errors)) {
                $errorMessage = "Note " . ($i + 1) . ": " . implode(", ", $errors);
                $allErrors[] = $errorMessage;
                echo "Validation error: " . implode(", ", $errors) . "\n";
            }
        }

        return $allErrors;
    }

    public function displayNotes(): void
    {
        echo "Your notes: \n";

        foreach ($this->notes as $index => $note) {
            echo ($index + 1) . ") " . $note . PHP_EOL;
        }
        echo "Total notes: " . count($this->notes) . PHP_EOL;//Добавлен вывод общего количества заметок
    }

    public function getNotes(): array
    {
        return $this->notes;
    }

    public function clearNotes(): void
    {
        $this->notes = [];
    }
    public function getNotesCount(): int
    {
        return count($this->notes);
    }
}
?>
