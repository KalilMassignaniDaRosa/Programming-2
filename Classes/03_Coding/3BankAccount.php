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

    public function deposit($amount) : string {
        $this->balance += $amount;
        return "<p><span class='success'>Successful deposit!</span></p>";
    }

    public function withdraw($amount) : string {
        $this->balance -= $amount;
        return "<p><span class='success'>Successful withdraw!</span></p>";
    }

    public function viewDetails(): string {
        return "<hr>
                Id: <span class='highlight'>{$this->id}</span><br>
                Name: {$this->titular}<br>
                Balance: R$ <strong>{$this->balance}</strong><br>
                <hr>";
    }
}

$b1 = new BankAccount(1, "Kalil", 50000);
$b2 = new BankAccount(2, "Carlos", 100);
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
        <h1>Bank Accounts</h1>
        <?= $b1->viewDetails() ?>
        <br>

        <?= $b1->deposit(500); ?>
        <br>

        <?= $b1->viewDetails() ?>
        <br>

        <?= $b2->viewDetails() ?>
        <br>

        <?= $b2->withdraw(25) ?>
        <br>

        <?= $b2->viewDetails() ?>
    </div>
</body>
</html>
