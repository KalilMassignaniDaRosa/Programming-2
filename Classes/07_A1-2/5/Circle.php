<?php
class Circle extends GeometricShape {
    private float $radius;

    public function __construct(float $radius) {
        $this->radius = $radius;
    }

    public function calculateArea(): float {
        // ** = potencia
        return pi() * ($this->radius ** 2);
    }
}
