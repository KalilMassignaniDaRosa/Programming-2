<?php
require_once "Vehicle.php";

class Bicycle extends Vehicle {
    public function move(): string {
        return "The bicycle is pedaling on the path";
    }
}
