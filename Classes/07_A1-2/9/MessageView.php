<?php
require_once "Message.php";
require_once "UppercaseMessage.php";
require_once "LowercaseMessage.php";
require_once "CapitalizedMessage.php";

// Criando os objetos antes do HTML
$uppercase = new UppercaseMessage();
$lowercase = new LowercaseMessage();
$capitalized = new CapitalizedMessage();

$text = "hello world from PHP";
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
        <h1>Message Formats</h1>

        <p>
            <strong>Uppercase:</strong> <?= $uppercase->format($text) ?>
        </p>
        <p>
            <strong>Lowercase:</strong> <?= $lowercase->format($text) ?>
        </p>
        <p>
            <strong>Capitalized:</strong> <?= $capitalized->format($text) ?>
        </p>

    </div>
</body>
</html>
