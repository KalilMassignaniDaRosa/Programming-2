<?php
class Product{
    private int $id;
    private string $name;
    private float $price;
    private int $quantity;

    public function __construct(int $id,string $name,float $price,int $quantity){
        $this->id = $id;
        $this->setName($name);
        $this->setPrice($price);
        $this->setQuantity($quantity);
    }

    #region Getters
    public function getId():int{
        return $this->id;
    }

    public function getName():string{
        return $this->name;
    }

    public function getPrice(): float{
        return $this->price;
    }

    public function getQuantity(): int{
        return $this->quantity;
    }
    #endregion

    #region Setters
    public function setId(int $id): void{
        if ($id <= 0){
            echo "<p>Error: Invalid id</p>";
        }
        $this->id = $id;
    }

    public function setName(string $name):void{
        $this->name = $name;
    }

    public function setPrice(float $price):void{
        if($price <=0){
            echo "<p>Error: Invalid price</p>";
        }
        $this->price = $price;
    }

    public function setQuantity(int $quantity):void{
        if($quantity <0){
            echo "<p>Error: Invalid quantity</p>";
        }
        $this->quantity = $quantity;
    }
    #endregion

    public function toCurrency(float $price):string{
        return "R$ ".number_format($price,2,',','.');
    }
}

$p1 = new Product(1,"Mouse Gamer",150,5);

echo "<h1>Product</h1>";
echo "<p>Id: ".$p1->getId()."</p>";
echo "<p>Name: ".$p1->getName()."</p>";
echo "<p>Price: ".$p1->toCurrency($p1->getPrice())."</p>";
echo "<p>Quantity: ".$p1->getQuantity()."</p>";