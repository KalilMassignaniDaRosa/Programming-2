<?php
require_once "GeometricShape.php";
require_once "Square.php";
require_once "Rectangle.php";
require_once "Circle.php";

$shapes = [
    new Square(5),
    new Rectangle(4, 7),
    new Circle(3)
];
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
        <h1>Geometric Shapes</h1>

        <?php foreach($shapes as $shape): ?>
            <p>
                <!-- get_class pega o nome da classe -->
                <strong><?= get_class($shape) ?>:</strong>
                <br>
                <span class=highlight>Area</span> = <?= $shape->calculateArea() ?>
            </p>
            <br>
        <?php endforeach; ?>
    </div>
</body>
</html>
