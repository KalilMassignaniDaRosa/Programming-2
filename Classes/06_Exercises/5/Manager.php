<?php
include "Employee.php";
class Manager extends Employee{
    public function getEmployeeSalary():float{
        return $this->getSalary();
    }
    public function setEmployeeSalary(Employee $em,float $salary): void{
        // Por lei nao pode diminuir salario
        if ($salary > $em->getSalary()){
            $em->salary = $salary;
        }
    }
}

$em = new Employee(2000);
$ma = new Manager(5000);

echo "<h1>Manager</h1>";
echo "<p>Before</p>";
echo "<p>Employee salary: $". $em->getSalary() ."</p>";

$ma->setEmployeeSalary($em,2500);

echo "<p>After</p>";
echo "<p>Employee salary: $". $em->getSalary() ."</p>";