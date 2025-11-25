<?php

class NoteManager
{
    private array $notes = [];
    private int $maxNoteLength = 100;
    private int $maxNotes = 100;

    public function askForNumberOfNotes(): int
    {
        echo "How many notes to save? ";
        $input = trim(fgets(STDIN));
        return (int)$input;
    }

    public function inputNotes(int $numberOfNotes): void
    {
        for ($i = 0; $i < $numberOfNotes && $i < $this->maxNotes; $i++) {
            echo "Note " . ($i + 1) . ": \n";
            $note = trim(fgets(STDIN));

            // Ограничение длины заметки (как в C++) 
            if (strlen($note) > $this->maxNoteLength) {
                $note = substr($note, 0, $this->maxNoteLength);
            }

            $this->notes[] = $note;
        }
    }

    public function displayNotes(): void
    {
        echo "Your notes: \n";

        foreach ($this->notes as $index => $note) {
            echo ($index + 1) . ") " . $note . PHP_EOL;
        }
    }

    public function getNotes(): array
    {
        return $this->notes;
    }

    public function clearNotes(): void
    {
        $this->notes = [];
    }
}
?>