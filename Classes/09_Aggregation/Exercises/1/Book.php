<?php
class Book{
    public int $id;
    public string $title;
    public string $synopsis;

    public function __construct(int $id, string $title, string $synopsis){
        $this->id = $id;
        $this->title = $title;
        $this->synopsis = $synopsis;
    }

    public function getTitle() : string {
        return $this->title;
    }
}
