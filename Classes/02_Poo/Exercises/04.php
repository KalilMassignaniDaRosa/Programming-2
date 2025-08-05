<?php
Class Person {
	public string $Name;
	public int $Age;
	
	public function __construct(string $name, int $age){
		$this->Name = $name;
		$this->Age = $age;
	}

	public function Introduce(){
		echo "My name is $this->Name and I'm $this->Age years old!\n";
	}
}

$p = new Person("Kalil", 21);
$p->Introduce();

$p = new Person("Silvio",22);
$p->Introduce();

$p = new Person("Matheus Louco",23);
$p->Introduce();
?>
