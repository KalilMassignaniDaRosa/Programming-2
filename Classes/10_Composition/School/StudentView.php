<?php
require_once 'Student.php';

$student = new Student("123.456.789-00", "Maria",
[8.5, 9.0, 7.5], 95);

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
        <h1><strong>Student's info:</strong></h1>

        <p>
            <?= $student->showInfo() ?>
        </p>
    </div>
</body>
</html>
