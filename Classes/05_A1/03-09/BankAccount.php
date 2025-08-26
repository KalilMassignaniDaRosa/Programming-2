<?php
class BankAccount{
    private int $id;
    private string $titular;
    private float $balance;

    public function __construct(string $titular, float $balance){
        $this->id = rand(1000,9999);
        $this->titular = $titular;
        $this->balance = $balance;
    }

    #region Id
    public function getId(): int{
        return $this->id;
    }
    #endregion

    #region Titular
    public function getTitular(): string{
        return $this->titular;
    }

    private function setTitular(string $titular): void{
        $this->titular = $titular;
    }
    #endregion

    #region Balance
    private function setBalance(float $amount): void{
        $this->balance = $amount;
    }

    public function getBalance(): float{
        return $this->balance;
    }

    private function showBalance(): void{
        echo "<p>$". $this->getBalance() ."</p>";
    }
    #end region

    #region Operations
    public function deposit(float $amount): void{
        if($amount <= 0.0){
            echo "<p>Error: Can't deposit below 0 values!</p>";
        }else{
            $balance = $this->getBalance();
            $this->setBalance($balance+$amount);

            echo "<p>$".$amount." deposited!</p>";
            echo $this->showBalance();
        }
    }

    public function withdraw(float $amount): void{
        if($amount > $this->getBalance()){
            echo "<p>Error: Can't withdraw more than your balance!</p>";
        }else{
            $balance = $this->getBalance();
            $this->setBalance($balance-$amount);

            echo $this->showBalance();
        }
    }
    #endregion
}

$account = new BankAccount("Kalil", 10000);

echo "<h1>Bank Account</h1>";
echo "<p> User: ". $account->getTitular() ."</p>";
$account->deposit(2500);
$account->withdraw(5000);