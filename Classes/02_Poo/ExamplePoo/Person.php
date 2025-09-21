<?php
Class Person {
	public string $name;
	public string $email;
	public int $age;

	public function __construct(string $name, string $email, int $age){
		$this->name = $name;
		$this->email = $email;
		$this->age = $age;
	}

	public function showInfo(): string{
		return "Name: {$this->name}<br>
                Email: {$this->email}<br>
                Age: {$this->age}";
	}

	public function verifyLegalAge($age){
		return $age >= 18;
	}
}

$p = new Person("João", "joao@example.com", 18);
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
        <p><?= $p->showInfo() ?></p>
        <p>
            Legal Age:
            <span class="highlight">
                <?= $p->verifyLegalAge($p->age) ? "Yes" : "No" ?>
            </span>
        </p>
    </div>
</body>
</html>
