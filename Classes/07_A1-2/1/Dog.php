<?php 
require_once "Animal.php";
class Dog extends Animal
{
    public function talk(): void {
        echo "Rof rof";
    }

    public function move(): void{
        echo "Runing...";
    }
}
