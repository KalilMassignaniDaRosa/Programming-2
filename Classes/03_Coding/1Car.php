<?php
class Car
{
    public $year;
    public $model;
    public $brand;

    public function __construct($year, $model, $brand)
    {
        $this->year = $year;
        $this->model = $model;
        $this->brand = $brand;
    }

    public function viewInformation(): string
    {
        return "Model: {$this->model}<br>
                Year: {$this->year}<br>
                Brand: <span class='highlight'>{$this->brand}</span>";
    }
}

$car1 = new Car(1994, "Sedan", "Fiat");

$car2 = new Car(0, "Y", "Y");
$car2->year = "2005";
$car2->model = "Sport";
$car2->brand = "Ferrari";
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
        <h1>Cars Information</h1>
        <p><?= $car1->viewInformation() ?></p>

        <br>
        <hr>
        <br>

        <p><?= $car2->viewInformation() ?></p>
    </div>
</body>
</html>
