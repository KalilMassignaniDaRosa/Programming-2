<?php
class Client{
    public string $name;
    protected string $cpf;
    private int $phone;

    public function __construct(string $name, string $cpf, int $phone){
        $this->name = $name;
        $this->cpf = $cpf;
        $this->phone = $phone;
    }

    public function showInside($c1){
        echo "<p>Name: ".$c1->name."</p>";
        echo "<p>Cpf: ".$c1->cpf."</p>";
        echo "<p>Phone: ".$c1->phone."</p>";
    }
}

$c1 = new Client("Roberto", "123456789",40028922);
echo "<h1>Client</h1>";

echo "<p>Trying to access data insside the class</p>";
$c1->showInside($c1);
echo "<br></br>";

echo "<p>Trying to access data outside the class</p>";
echo "<p>Name: ".$c1->name."</p>";
echo "<p>Cpf: ".$c1->cpf."</p>";
echo "<p>Phone: ".$c1->phone."</p>";