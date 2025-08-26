<?php
class Product{
    public string $name;
    private float $price;

    // Agora o preço precisa passar pelos getters
    public function __construct(string $name){
        $this->name = $name;
    }

    public function getPrice(): float{
        return $this->price;
    }

    public function setPrice(float $price): void{
        if ($price > 0){
            $this->price = $price;
        }
    }
}

$product = new Product("Keyboard");
$product->setPrice(150);

echo "<h1>Product</h1>";
echo "<p> ". $product->name ."</p>";
echo "<p> $". $product->getPrice() ."</p>";