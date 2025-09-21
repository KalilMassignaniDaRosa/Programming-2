<?php
class Product
{
    public string $name;
    public int $price;
    public int $quantity;
    public int $total = 0;

    public function __construct(string $name, int $price, int $quantity, int $total)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->total = $total;
    }

    public function totalValue()
    {
        $this->total = $this->price * $this->quantity;
    }

    public function show(): string
    {
        return "Product: <span class='highlight'>{$this->name}</span><br>
                Price: R$ {$this->price}<br>
                Quantity: {$this->quantity}<br>
                Total: R$<strong> {$this->total}</strong>";
    }
}
$p = new Product("Mouse", 15, 5, 0);
$p->totalValue();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= basename(__FILE__) ?></title>
    <link rel="stylesheet" href="../../generic.css">
</head>
<body>
    <div class="container">
        <h1>Product Info</h1>
        <p><?= $p->show() ?></p>
    </div>
</body>
</html>
