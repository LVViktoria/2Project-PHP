<?php
require_once 'NoteManager.php';
require_once 'NoteValidator.php';
class Application
{
private NoteManager $noteManager;
private NoteValidator $validator;


public function __construct()
{
$this->validator = new NoteValidator();
$this->noteManager = new NoteManager($this->validator);
}

public function run(): void
{
try {
$numberOfNotes = $this->askForNumberOfNotes();
$validationErrors = $this->validator->validateNumberOfNotes($numberOfNotes);
if (!empty($validationErrors)) {
    echo "Error: " . implode(", ", $validationErrors) . "\n";
 return;
 }


$errors = $this->noteManager->inputNotes($numberOfNotes);

if (!empty($errors)) 
    {
    echo "\nSome notes were skipped due to validation errors:\n";
foreach ($errors as $error)
{
    echo " - $error\n";
}
echo "\n";
}

$this->noteManager->displayNotes();
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage() . "\n";
}
}
private function askForNumberOfNotes(): int
{
echo "How many notes to save? ";
$input = trim(fgets(STDIN));
{
    return (int)$input;
}
}
}

?>