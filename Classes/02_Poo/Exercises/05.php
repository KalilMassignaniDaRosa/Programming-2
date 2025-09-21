<?php
Class Person {
	private string $name;
	private int $age;

	public function __construct(string $name, int $age){
		$this->name = $name;
		$this->age = $age;
	}

    // usando : para espeficiar o tipo do retorno
    public function getName(): string{
        return $this->name;
    }

    public function getAge(): int{
        return $this->age;
    }

	public function introduce(){
		return "My name is <span class='highlight'>{$this->name}</span>
		and I'm <span class='highlight'>{$this->age}</span> years old!";
	}
}

$p = new Person("Kalil", 21);
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
        <h1>Person Info</h1>
        <p><?= $p->Introduce() ?></p>
        <p>Name: <span class="highlight"><?= $p->getName() ?></span></p>
        <p>Age: <span class="highlight"><?= $p->getAge() ?></span></p>
    </div>
</body>
</html>
