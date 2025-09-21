<?php
require_once 'Item.php';
require_once 'CartItem.php';
require_once 'Cart.php';

// cria itens e carrinho
$i1 = new Item(1,"Mouse", 15);
$i2 = new Item(2,"Keyboard",99.90);
$i3 = new Item(3,"Chair",150);
$i4 = new Item(4,"Table",550);
$i5 = new Item(5,"Laptop",4500);


$cart = new Cart();
$cart->addItem($i1,1);
$cart->addItem($i2,1);
$cart->addItem($i5,2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../../generic.css">
</head>
<body>
    <div class="container">
        <h1>My Shopping Cart</h1>
        <?= $cart->showCart() ?>
    </div>
</body>
</html>
