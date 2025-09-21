<?php
require_once "Notification.php";
require_once "Email.php";
require_once "SMS.php";
require_once "Push.php";

$emailNote = new Email("Hello via Email!");
$smsNote   = new SMS("Hello via SMS!");
$pushNote  = new Push("Hello via Push Notification!");
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
        <h1>Notifications</h1>
        <p><?= $emailNote->send() ?></p>
        <p><?= $smsNote->send() ?></p>
        <p><?= $pushNote->send() ?></p>
    </div>
</body>
</html>
