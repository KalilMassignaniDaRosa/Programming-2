<?php
require_once 'Item.php';

class CartItem {
    public Item $item;
    public int $quantity;

    public function __construct(Item $item, int $quantity = 1){
        $this->item = $item;
        $this->quantity = $quantity;
    }

    public function showCartItem(): string {
        $subtotal = $this->item->price * $this->quantity;

        return $this->item->showItem() .
               "Quantity: {$this->quantity}<br>
                Subtotal: $<strong>{$subtotal}</strong><br>
                <br><hr>";
    }
}
