<?php
require_once "Printer.php";
require_once "PDFPrinter.php";
require_once "TextPrinter.php";
require_once "ImagePrinter.php";

$pdfPrinter = new PDFPrinter();
$textPrinter = new TextPrinter();
$imagePrinter = new ImagePrinter();
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
        <h1>Printer Outputs</h1>

        <p>
            <strong>PDF Printer:</strong> <?= $pdfPrinter->print() ?>
        </p><br>
        <p>
            <strong>Text Printer:</strong> <?= $textPrinter->print() ?>
        </p><br>
        <p>
            <strong>Image Printer:</strong> <?= $imagePrinter->print() ?>
        </p><br>

    </div>
</body>
</html>
