<?php
Class Account{
    public int $id;
    private string $titular;
    private float $balance;
    
    public function __construct(string $titular, float $balance){
        $this->id = rand(1000,9999);
        $this->titular = $titular;
        $this->balance = $balance;
    }

    public function getId(): int{
        return $this->id;
    }
    public function getTitular(): string{
        return $this->titular;
    }

    private function setTitular(string $titular): void{
        $this->titular = $titular;
    }

    public function getBalance(): float{
        return $this->balance;
    }
    public function showBalance(): string{
        return "Balance: $". $this->getBalance()."\n";
    }


    private function setBalance(float $amount): void{
        $this->balance = $amount;
    }

    public function deposit(float $amount): void{
        if($amount <= 0.0){
            echo "Error: Can't deposit below 0 values!\n";
        }else{
            $balance = $this->getBalance();
            $this->setBalance($balance+$amount);

            echo "$".$amount." deposited!\n";
            echo $this->showBalance();
        }
    }

    public function withdraw(float $amount): void{
        if($amount > $this->getBalance()){
            echo "Error: Can't withdraw more than your balance!\n";
        }else{
            $balance = $this->getBalance();
            $this->setBalance($balance-$amount);

            echo $this->showBalance();
        }
    }

    public function showInfo()    {
        echo "--------------------------------\n";
        echo "Id: ".$this->getId()."\n";
        echo "Titular: ".$this->getTitular()."\n";
        echo $this->showBalance();
        echo "--------------------------------\n";
    }

}

$account1 = new Account("Carlos Silva",500);
$account2 = new Account("Ana Oliveira",1200);

$account1->showInfo();
$account1->deposit(300);
$account1->showInfo();