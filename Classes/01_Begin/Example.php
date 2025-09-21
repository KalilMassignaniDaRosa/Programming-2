<?php
    // Codigo Php estruturado
    // Php possui tipagem dinamica
    // Usando o $ e possivel explicitar qual voce quer
    $price = 100;
    $discount = 0.1;
    $final = $price - ($price * $discount);

    /* <?= ?>
    E um atalho para um echo dentro do html*/
    /* <?php ?> para usar no html */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= basename(__FILE__) ?></title>
    <link rel="stylesheet" href="../generic.css">
</head>
<body>
    <div class="container">
        <h1>Purchase Summary</h1>
        <p>Price:R$<?= $price ?></p>
        <p>Discount:<?= $discount * 100 ?>%</p>
        <p>Final:R$<?= $final ?></p>
    </div>
</body>
</html>
