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
$p1 = new Person("Kalil", 21);
$p2 = new Person("Silvio", 22);
$p3 = new Person("Matheus Louco", 23);
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
        <h1>Introductions</h1>
        <p><?= $p1->introduce() ?></p>
        <p><?= $p2->introduce() ?></p>
        <p><?= $p3->introduce() ?></p>
    </div>
</body>
</html>
