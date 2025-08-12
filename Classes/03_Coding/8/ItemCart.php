<?php
class CartItem {
    public Item $item;
    public int $quantity;

    public function __construct(Item $item, int $quantity = 1){
        $this->item = $item;
        $this->quantity = $quantity;
    }

    public function showCartItem(): void {
        $this->item->showItem();
        echo "Quantity: " . $this->quantity . "\n";
        echo "Subtotal: $" . ($this->item->price * $this->quantity) . "\n";
    }
}