<?php
// Import em php
require_once 'Item.php';
require_once 'CartItem.php';
class Cart{
    public array $items = [];

    public function addItem(Item $item, int $quantity): void {
        foreach ($this->items as $cartItem) {
            if ($cartItem->item->id == $item->id) {
                $cartItem->quantity += $quantity;
                return;
            }
        }
        // Se nao achou adiciona novo item
        $this->items[] = new CartItem($item, $quantity);
    }

    public function total(): float{
        // usando o . para iniciar como float
        $total = 0.0;
        foreach ($this->items as $cartItem) {
            $total += $cartItem->item->price * $cartItem->quantity;
        }

        return $total;
    }

    public function showCart(): string {
        $html = "";

        foreach ($this->items as $cartItem) {
            $html .= $cartItem->showCartItem();
        }

        $html .= "<strong>Total: $".$this->total()."</strong><br><hr>";
        return $html;
    }
}
