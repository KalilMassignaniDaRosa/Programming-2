<?php
require_once "Vehicle.php";
require_once "Car.php";
require_once "Bicycle.php";
require_once "Airplane.php";

// Por algum motivo meu compilador indica erro no car
// pedindo 3 argumentos, mas ainda sim funciona
// quando o pasta da aula e o root nao acontece
$car = new Car();
$bicycle = new Bicycle();
$airplane = new Airplane();
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
        <h1>Vehicle Movements</h1>

        <p>
            <strong>Car:</strong> <?= $car->move() ?>
        </p>
        <p>
            <strong>Bicycle:</strong> <?= $bicycle->move() ?>
        </p>
        <p>
            <strong>Airplane:</strong> <?= $airplane->move() ?>
        </p>

    </div>
</body>
</html>
