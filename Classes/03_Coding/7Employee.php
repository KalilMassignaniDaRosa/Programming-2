<?php
class Employee{
    public string $name;
    public float $salary;

    public function __construct(string $name,$salary){
        $this->name = $name;
        $this->salary = $salary;
    }

    public function raiseSalary($raise): void{
        $this->salary += $this->salary * $raise;
    }

    public function show(): string {
        return "Employee: <span class='highlight'>{$this->name}</span><br>
                Salary: R$ <strong>{$this->salary}</strong><br>";
    }
}

$e = new Employee("Kalil", 5000);
// 10%
$raise = 0.10;
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
        <h1>Employee Salary</h1>

        <p>Before raise:</p>
        <p><?= $e->show() ?></p>

        <p>After 10% raise:</p>
        <?php $e->raiseSalary($raise); ?>
        <p><?= $e->show() ?></p>
    </div>
</body>
</html>
