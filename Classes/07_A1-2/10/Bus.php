<?php
require_once "Transport.php";

class Bus extends Transport{
    // Fare = tarifa
    private float $baseFare = 1.5;

    public function getBaseFare(): float {
        return $this->baseFare;
    }

    public function calculateFare(float $distance): float {
        // Base + R$0.5 por km
        return $this->baseFare + 0.5 * $distance;
    }
}
