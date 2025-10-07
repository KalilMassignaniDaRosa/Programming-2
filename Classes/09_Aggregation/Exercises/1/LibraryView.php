<?php
require_once "Book.php";
require_once "Library.php";

$books = [
    new Book(1, "1984", "Dystopian novel by George Orwell"),
    new Book(2, "The Lord of the Rings", "Epic fantasy by J.R.R. Tolkien"),
    new Book(3, "Dom Casmurro", "Classic novel by Machado de Assis")
];

$lib = new Library("Silvio Bolzani",25, "Nicolau Cavon",$books);

$newBook = new Book(4, "The Little Prince", "Classic by Antoine de Saint-Exupéry");

$lib->addBook($newBook);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= basename(__FILE__) ?></title>
    <link rel="stylesheet" href="../../../generic.css">
</head>
<body>
    <div class="container">
        <h1>Library's books:</h1>

        <p>
            <strong>Name:</strong> <?= $lib->getName()?><br>
            <strong>Address:</strong> <?= $lib->getAddress() ?>

            <hr>

            <strong>Titles:</strong>
            <?= $lib->showAllTitles() ?>
        </p>
    </div>
</body>
</html>
