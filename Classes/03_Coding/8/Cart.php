<?php
// Import em php
require_once 'Item.php';
require_once 'ItemCart.php';
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

    public function showCart(): void {
        echo "------- Cart -------\n";
        foreach ($this->items as $cartItem) {
            $item = $cartItem->item;
            $quantity = $cartItem->quantity;
            $price = $item->price;
            $subtotal = $price * $quantity;

            echo "Product: {$item->name}\n";
            echo "Unit Price: $ {$price}\n";
            echo "Quantity: {$quantity}\n";
            echo "Subtotal: $ {$subtotal}\n";
            echo "--------------------\n";
        }
        echo "Total: $ " . $this->total() . "\n";
        echo "--------------------\n";
    }
}

$i1 = new Item(1,"Mouse", 15);
$i2 = new Item(2,"Keyboard",99.90);
$i3 = new Item(3,"Chair",150);
$i4 = new Item(4,"Table",550);
$i5 = new Item(5,"Laptop",4500);

$cart = new Cart();
$cart->addItem($i1,1);
$cart->addItem($i5, 2);

$cart->showCart();