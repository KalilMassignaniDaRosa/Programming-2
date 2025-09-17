<?php
include "Dog.php";
include "Cat.php";
include "Bird.php";

$dog = new Dog();
$cat = new Cat();
$bird = new Bird();

$animals = array(
    "Dog" => $dog,
    "Cat" => $cat,
    "Bird" => $bird,
);

foreach($animals as $key=>$a){
    echo "<p>$key</p>";
    echo "<p>Talking: "; 
    $a->talk();
    echo "</p>";

    echo "<p>Moving: ";
    $a->move();
    echo "</p>";
    echo "<br></br>";
}