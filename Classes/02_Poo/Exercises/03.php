<?php
class Person
{
	public string $name;
	public int $age;

	public function __construct(string $name, int $age)
	{
		$this->name = $name;
		$this->age = $age;
	}

	public function introduce(): string
	{
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
        <h1>Introduction</h1>
        <p><?= $p->introduce() ?></p>
    </div>
</body>
</html>
