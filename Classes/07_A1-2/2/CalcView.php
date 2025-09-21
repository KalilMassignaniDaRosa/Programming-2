<?php
require_once "Calculator.php";

function showResult($calc, $result) {
            $error = $calc->getError();
            $class = $error ? 'error' : 'success';
            $value = $error ?? $result;
            return "<span class='$class'>$value</span>";
        }

$calc = new Calculator();
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
        <h1>Calculator Results</h1>

        <p>5 + 2 = <?= showResult($calc, $calc->calculate('+', 5, 2)) ?></p>

        <p>7 * 5 = <?= showResult($calc, $calc->calculate('*', $calc->calculate('+', 5, 2), 5)) ?></p>

        <p>35 / 11 = <?= showResult($calc, $calc->calculate('/',
        $calc->calculate('*', $calc->calculate('+', 5, 2), 5), 11)) ?></p>

        <br><hr><br>
        <p>Sum array [1,2,3,4] = <?= showResult($calc, $calc->calculate('+', [1,2,3,4])) ?></p>
        <br><hr><br>

        <p>Test divide by zero = <?= showResult($calc, $calc->calculate('/', 5, 0)) ?></p>
    </div>
</body>
</html>
