<?php
class Product{
    public string $name;
    public float $price;

    public function __construct($name, $price){
        $this->name = $name;
        $this->price = $price;
    }
}

$product = new Product("Keyboard", 150);

echo "<h1>Product</h1>";
echo "<p> ". $product->name ."</p>";
echo "<p> $". $product->price ."</p>";