<?php
require_once "Transport.php";

class Subway extends Transport{
    private float $baseFare = 2;

    public function getBaseFare(): float {
        return $this->baseFare;
    }

    public function calculateFare(float $distance): float {
        // Base + R$1.2 por km
        return $this->baseFare + 1.2 * $distance;
    }
}
