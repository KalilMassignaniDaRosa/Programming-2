<?php
// Fora de uma classe nao e possivel criar variavel explicita
$name = "Kalil";
$age = 21;
$message = "My name is $name and I'm $age years old!";
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
        <h1>About Me</h1>
        <p><?= $message ?></p>
    </div>
</body>
</html>
