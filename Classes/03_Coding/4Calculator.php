<?php
class Caculator{
    public float $value1;
    public float $value2;
    public float $result;

    public function addition($value1,$value2) : void{
        $this->showInput($value1,$value2, "+");
        $this->result = $value1 + $value2;
        $this->showResult();
    }

    public function subtractition($value1,$value2) : void{
        $this->showInput($value1,$value2, "-");
        $this->result = $value1 - $value2;
        $this->showResult();
    }

    public function multiply($value1,$value2) : void{
        $this->showInput($value1,$value2, "*");
        $this->result = $value1 * $value2;
        $this->showResult();
    }

    public function divide($value1,$value2) : void{
        $this->showInput($value1,$value2, "/");
        $this->result = $value1 / $value2;
        $this->showResult();
    }

    public function showResult(): void{
        echo $this->result."\n";
    }
    public function showInput($value1,$value2, $operation) : void{
        echo $value1." ". $operation ." ".$value2."\n";
    }

    public function clear() : void{
        $this->result = 0;
        $this->value1 = 0;
        $this->value2 = 0;
        echo "Values clear!\n";
    }

    public function __construct($value1,$value2, $result){
        $this->value1 = $value1;
        $this->value2 = $value2;
        $this->result = $result;
    }
}

$calc = new Caculator(0,0,0);
$calc->addition(5,2);
$calc->multiply($calc->result, 5);
$calc->divide($calc->result, 11);
$calc->clear();

$calc->subtractition(5000, 1234);