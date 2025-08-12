<?php
class BankAccount{
    public int $id;
    public string $titular;
    private float $balance;

    public function __construct(int $id, string $titular, float $balance){
        $this->id = $id;
        $this->titular = $titular;
        $this->balance = $balance;
    }

    public function deposity($amount) : void {
        $this->balance += $amount;
        echo "Successful operation!\n";
    }

    public function withdraw($amount) : void {
        $this->balance -= $amount;
        echo "Successful operation!\n";
    }

    public function viewDetails():void {
        echo "-------------------\n";
        echo "Id: ". $this->id ."\n";
        echo "Name: ". $this->titular ."\n";
        echo "Balance: $". $this->balance ."\n";
        echo "-------------------\n";
    }
}

$b1 = new BankAccount(1, "Kalil", 50000);
$b2 = new BankAccount(2, "Carlos", 100);

$b1->viewDetails();
$b1->deposity(500);
$b1->viewDetails();

$b2->withdraw(25);
$b2->viewDetails();