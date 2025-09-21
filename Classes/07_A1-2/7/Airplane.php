<?php
require_once "Vehicle.php";

class Airplane extends Vehicle {
    public function move(): string {
        return "The airplane is flying in the sky";
    }
}
