
<?php
function addBook(Book $book) {
    $this->book[] = $book;
}

?>

<?php 

function getLibrary(): Library {
    return $this->library;
}

?>