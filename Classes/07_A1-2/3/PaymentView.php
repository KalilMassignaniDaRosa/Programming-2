<?php
require_once "Payment.php";
require_once "CreditCard.php";
require_once "Pix.php";
require_once "BankSlip.php";

$creditCardPayment = new CreditCard(120.75);
$pixPayment = new Pix(85.40);
$bankSlipPayment = new BankSlip(210.00);

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
        <h1>Payments</h1>
        <?= $creditCardPayment->process() ?>
        <?= $pixPayment->process() ?>
        <?= $bankSlipPayment->process() ?>
    </div>
</body>
</html>
