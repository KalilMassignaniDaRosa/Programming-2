<?php
require_once 'Person.php';

$person = new Person("Castiel");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= basename(__FILE__) ?></title>
    <link rel="stylesheet" href="../../../generic.css">
</head>
<body>
    <div class="container">
        <h1><strong>Person's info:</strong></h1>

        <p><strong>Name:</strong> <?= $person->name?></p>
        <p><strong>Heart:</strong></p>
        <p>
            <?= $person->heartPulse() ?>
        </p>
    </div>
</body>
</html>
