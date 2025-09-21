<?php
require_once "Vehicle.php";

class Car extends Vehicle {
    public function move(): string {
        return "The car is driving on the road";
    }
}
