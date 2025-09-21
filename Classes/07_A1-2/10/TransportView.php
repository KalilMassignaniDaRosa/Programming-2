<?php
require_once "Transport.php";
require_once "Bus.php";
require_once "Subway.php";
require_once "Taxi.php";

$bus = new Bus();
$subway = new Subway();
$taxi = new Taxi();

$distance = 10;
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
        <h1>Transport Fares</h1>

        <div class="transport">
            <h2>Bus</h2>
            <p>Base Fare: $<?= $bus->getBaseFare() ?></p>
            <p>Total for <?= $distance ?> km: $<?= $bus->calculateFare($distance) ?></p>
            <br>
        </div>

        <div class="transport">
            <h2>Subway</h2>
            <p>Base Fare: $<?= $subway->getBaseFare() ?></p>
            <p>Total for <?= $distance ?> km: $<?= $subway->calculateFare($distance) ?></p>
            <br>
        </div>

        <div class="transport">
            <h2>Taxi</h2>
            <p>Base Fare: $<?= $taxi->getBaseFare() ?></p>
            <p>Total for <?= $distance ?> km: $<?= $taxi->calculateFare($distance) ?></p>
            <br>
        </div>

    </div>
</body>
</html>
