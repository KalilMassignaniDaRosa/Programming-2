<?php
require_once "Report.php";

$report = new Report();

// O metodo generate nao foi criado, entao ele chama o __call
$results = [
    $report->generate(),
    $report->generate("Sales"),
    $report->generate("Sales", "21/09/2025")
];
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
        <h1>Report Method Calls</h1>
        <?php foreach($results as $res): ?>
            <p><?= $res ?></p>
        <?php endforeach; ?>
    </div>
</body>
</html>
