<?php
class Order{
    private array $itens;

    public function __construct(array $itens){
        $this->itens = $itens;
    }

    public function getItens(): array{
        return $this->itens;
    }

    public function addItem($item): void{
        $this->itens[] = $item;
    }

    public function showArray($order): void{
        echo "<ul>";
        foreach ($order->getItens() as $item) {
        echo "<li>$item</li>";
        }
        echo "</ul>";

    }
}

$order = new Order(["Mouse"]);
echo "<h1>Order</h1>";
echo "<p>Before</p>";
$order ->showArray($order);

$order->addItem("Keyboard");
echo "<p>After</p>";
$order ->showArray($order);