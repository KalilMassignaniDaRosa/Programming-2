<?php
class Item{
    public int $id;
    public string $name;
    public float $price;

    public function __construct(int $id,string $name, float $price){
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public function showItem(): void{
        echo "Id: ". $this->id ."\n";
        echo "Name: ". $this->name ."\n";
        echo "Price: $". $this->price ."\n";
    }
}

$i1 = new Item(1,"Mouse", 15);
$i2 = new Item(2,"Keyboard",99.90);
$i3 = new Item(3,"Chair",150);
$i4 = new Item(4,"Table",550);
$i5 = new Item(5,"Laptop",4500);

//$i5->showItem();