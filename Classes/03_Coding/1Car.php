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

    public function viewInformation() : string{
        return "Model: ". $this->model. "\nYear: ". $this->year . "\nBrand: ". $this->brand;
    }
}

$car1 = new Car(1994, "Sedan", "Fiat");

$car2 = new Car(0, "Y", "Y");
$car2->year = "2005";
$car2->model = "Sport";
$car2->brand = "Ferrari";


echo $car1->viewInformation();
echo "\n------------------\n";
echo $car2->viewInformation();