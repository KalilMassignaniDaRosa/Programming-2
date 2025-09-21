<?php
require_once "Transport.php";

class Taxi extends Transport{
    private float $baseFare = 5;

    public function getBaseFare(): float {
        return $this->baseFare;
    }

    public function calculateFare(float $distance): float {
        // Base + R$0.7 por km
        return $this->baseFare + 0.7 * $distance;
    }
}
