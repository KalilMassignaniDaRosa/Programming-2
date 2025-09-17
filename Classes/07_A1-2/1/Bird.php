<?php 
require_once "Animal.php";
class Bird extends Animal
{
    public function talk(): void {
        echo "Piu piu";
    }

    public function move(): void{
        echo "Flying...";
    }
}
