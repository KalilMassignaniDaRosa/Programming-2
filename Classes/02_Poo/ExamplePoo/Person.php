<?php
Class Person {
	public string $Name;
	public string $Email;
	public int $Age;
	
	public function __construct(string $name, string $email, int $age){
		$this->Name = $name;
		$this->Email = $email;
		$this->Age = $age;
	}

	public function ShowInfo(string $name,string $email, int $age){
		echo "Name: $name \nEmail: $email \nAge: $age";
	}

	public function VerifyLegalAge($age){
		return $age >= 18;
	}
}

$p = new Person("João", "joao@example.com", 18);
$p->ShowInfo($p->Name, $p->Email, $p->Age);
$p->VerifyLegalAge($p->Age);
?>
