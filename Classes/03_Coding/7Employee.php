<?php
class Employee{
    public string $name;
    public float $salary;

    public function __construct(string $name,$salary){
        $this->name = $name;
        $this->salary = $salary;
    }

    public function raiseSalary($raise){
        $this->salary += $this->salary * $raise;
    }
}

$e = new Employee("Kalil", 5000);
// 10%
echo "Salary: $". $e->salary."\n";
$raise = 0.10;
$e->raiseSalary($raise);

echo "New Salary: $". $e->salary."\n";