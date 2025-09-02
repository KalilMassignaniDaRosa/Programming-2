<?php
class Employee{
    protected float $salary;

    public function getSalary():float{
        return $this->salary;
    }
    
    public function __construct(float $salary){
        $this->salary = $salary;
    }
}

