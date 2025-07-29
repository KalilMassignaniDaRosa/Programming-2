<?php
    // Código Php estruturado
    // Php possui tipagem dinamica
    // Usando o $ é possivel explicitar qual voce quer
    $price = 100;
    $discount = 0.1;
    $final = $price - ($price * $discount);

    echo "Price: R$$price";
    echo "\nDiscount:", $discount*100, "%";
    echo "\nFinal: R$$final";
?>