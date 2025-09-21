<?php
require_once "Animal.php";
class Dog extends Animal
{
    public function talk(): void {
        echo "Woof Woof";
    }

    public function move(): void{
        echo "Runing...";
    }
}
