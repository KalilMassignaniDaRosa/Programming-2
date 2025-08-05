<?php
Class Person {
	private string $Name;
	private int $Age;
	
	public function __construct(string $name, int $age){
		$this->Name = $name;
		$this->Age = $age;
	}

    // usando : para espeficiar o tipo do retorno
    public function getName(): string{
        return $this->Name;
    }

    public function getAge(): int{
        return $this->Age;
    }

	public function Introduce(string $name, int $age){
		echo "My name is $name and I'm $age years old!";
	}
}

$p = new Person("Kalil", 21);
// Interpolacao
echo "Name: ".$p->getName()."\n";
echo "Age: ".$p->getAge();
?>
