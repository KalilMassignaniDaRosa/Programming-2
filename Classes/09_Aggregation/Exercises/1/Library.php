<?php
require_once "Book.php";

class Library
{
    private string $name;
    private int $number;
    private string $address;
    private ?array $books;

    public function __construct(string $name,int $number, string $address, array $books)
    {
        $this->name = $name;
        $this->number = $number;
        $this->address = $address;
        $this->books = $books;
    }

    public function showAllTitles() : string {
        $books = $this->getBooks();
        $message = "<p>";

        foreach($books as $b){
            $message .= $b->getTitle() . "<br>";
        }

        $message .= "<p>";
        return $message;
    }

    public function addBook(Book $book): void{
        $this->books[] = $book;
    }

    #region Getters
    public function getName(): string
    {
        return $this->name;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getAddress(): string
    {
        return $this->address . " - " . $this->number;
    }

    public function getBooks(): array
    {
        return $this->books;
    }
    #endregion
}
