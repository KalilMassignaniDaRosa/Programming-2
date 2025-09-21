<?php
abstract class Transport {
    abstract public function calculateFare(float $distance): float;
}
