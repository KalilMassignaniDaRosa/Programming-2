<?php
Class Product{
    public string $Name;
    public int $Price;
    public int $Quantity;
    public int $Total = 0;

    public function __construct(string $name, int $price, int $quantity, int $total){
		$this->Name = $name;
        $this->Price = $price;
        $this->Quantity = $quantity;
        $this->Total = $total;
	}

    public function totalValue(){
        $this->Total = $this->Price * $this->Quantity;
    }

}
$p = new Product("Mouse", 15, 5, 0);
$p->totalValue();
echo "Product: " . $p->Name . "\n";
echo "Price: " . $p->Price . "\n";
echo "Quantity: " . $p->Quantity . "\n";
echo "Total: " . $p->Total . "\n";
?>