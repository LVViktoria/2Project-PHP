<?php
require_once 'NoteManager.php';

class Application
{
private NoteManager $noteManager;

public function __construct()
{
$this->noteManager = new NoteManager();
}

public function run(): void
{
try {
$numberOfNotes = $this->noteManager->askForNumberOfNotes();

if ($numberOfNotes <= 0) {
    echo "Number of notes must be positive.\n" ;
    return;
    }

    $this->noteManager->inputNotes($numberOfNotes);
    $this->noteManager->displayNotes();

    } catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage() . "\n";
    }
    }
    }
    ?>