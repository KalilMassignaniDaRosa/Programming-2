<?php 
require_once "Animal.php";
class Cat extends Animal
{
    public function talk(): void {
        echo "Meow meow";
    }

    public function move(): void{
        echo "Walking...";
    }
}
