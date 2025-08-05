<?php
Class Person {
	public string $Name;
	public int $Age;
	
	public function __construct(string $name, int $age){
		$this->Name = $name;
		$this->Age = $age;
	}

	public function Introduce(){
		echo "My name is $this->Name and I'm $this->Age years old!";
	}

    public function BirthDay(){
       $this->Age = $this->Age +1 ;
	}
}

$p = new Person("Kalil", 21);
$p->BirthDay();
$p->Introduce();
?>
