<?php
Class Person {
	public string $name;
	public int $age;

	public function __construct(string $name, int $age){
		$this->name = $name;
		$this->age = $age;
	}

	public function introduce(): string{
		return "My name is <span class='highlight'>{$this->name}</span>
		and I'm <span class='highlight'>{$this->age}</span> years old!";
	}
    public function birthDay(): void{
       $this->age = $this->age +1 ;
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
        <p>Before birthday:</p>
        <p><?= $p->introduce() ?></p>


        <?php $p->birthDay(); ?>
		<br>
        <p>After birthday:</p>
        <p><?= $p->introduce() ?></p>
    </div>
</body>
</html>
