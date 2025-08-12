<?php
class Rectangle{
    public float $height;
    public float $width;
    public float $area = 0;
    public float $perimeter = 0;

    public function __construct($height,$width,$area = 0,$perimeter = 0){
        $this->height = $height;
        $this->width = $width;
        $this->area = $area;
        $this->perimeter = $perimeter;
    }

    public function calculateArea(): void{
        $this->area = $this->width * $this->height;
    }
    public function calculatePerimeter(): void{
        $this->perimeter = ((2 * $this->width) + (2 * $this->height));
    }
}

$r = new Rectangle(7,8);
echo "Height: ". $r->height. "\n";
echo "Width: ". $r->width. "\n";

$r->calculatePerimeter();
echo "Perimeter: ". $r->perimeter. "\n";

$r->calculateArea();
echo "Area: ". $r->area. "\n";
