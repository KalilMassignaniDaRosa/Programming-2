<?php
class Student{
    public string $name;
    public float $average;

    public function __construct(string $name,$average){
        $this->name = $name;
        $this->average = $average;
    }

    public function verifyApprove():bool {
        return $this->average >= 7;
    }

    public function returnSituation(): string{
        $situation = $this->verifyApprove() ? "Approved" : "Failed";
        $classColor = $this->verifyApprove() ? "success" : "error";

        return "<span class='{$classColor}'>{$situation}</span>";
    }

    public function show(): string {
        return "Student: {$this->name}<br>
                Average: {$this->average}<br>
                Situation: {$this->returnSituation()}";
    }
}

$s1 = new Student("Arthur", 8.5);
$s2 = new Student("Flávia",5);
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
        <h1>Students</h1>
        <p><?= $s1->show() ?></p>

        <br><hr><br>

        <p><?= $s2->show() ?></p>
    </div>
</body>
</html>
