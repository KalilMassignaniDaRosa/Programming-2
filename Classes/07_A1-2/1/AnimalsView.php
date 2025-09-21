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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= basename(__FILE__) ?></title>
    <link rel="stylesheet" href="../../generic.css">
</head>
<body>
    <div class="container">
        <h1>Animals</h1>

        <?php foreach($animals as $key => $a): ?>
            <div class="animal">
                <br>
                <p><strong><?= $key ?></strong></p>

                <p>Talking: <span class="highlight">
                    <?php $a->talk(); ?>
                </span></p>

                <p>Moving: <span class="highlight">
                    <?php $a->move(); ?>
                </span></p>
                <br><hr>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
