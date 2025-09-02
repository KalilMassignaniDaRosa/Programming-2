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

    #region Getters
    public function getId(): int{
        return $this->id;
    }

    public function getTitular(): string{
        return $this->titular;
    }

    public function getBalance(): float{
        return $this->balance;
    }
    #endregion

    #region Setters
    private function setTitular(string $titular): void{
        $this->titular = $titular;
    }
    
    private function setBalance(float $amount): void{
        if ($amount <0 ){
            echo "<p>Error: Can't set balance below 0!</p>";
        }
        $this->balance = $amount;
    }
    #endregion

    #region Currency
    private function showBalance(): void{
        echo "<p>Balance: ". $this->toCurrency($this->getBalance()) ."</p>";
    }

    public function toCurrency(float $price):string{
        return "R$ ".number_format($price,2,',','.');
    }
    #endregion

    #region Operations
    public function deposit(float $amount): void{
        if($amount <= 0.0){
            echo "<p>Error: Can't deposit below 0!</p>";
        }else{
            $balance = $this->getBalance();
            $this->setBalance($balance+$amount);

            echo "<p>".$this->toCurrency($amount)." deposited!</p>";
            echo $this->showBalance();
        }
    }

    public function withdraw(float $amount): void{
        if($amount > $this->getBalance()){
            echo "<p>Error: Can't withdraw more than your balance!</p>";
        }else{
            $balance = $this->getBalance();
            $this->setBalance($balance-$amount);

            echo "<p>".$this->toCurrency($amount)." withdrawn!</p>";
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
$account->withdraw(7500);
$account->withdraw(100);