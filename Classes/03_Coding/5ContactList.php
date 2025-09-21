<?php
class Contact{
    public string $name;
    public string $email;
    public string $phone;

    public function __construct(string $name, string $email, string $phone){
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function show(): string {
        return "Name: <span class='highlight'>{$this->name}</span><br>
                Email: {$this->email}<br>
                Phone: {$this->phone}
                <br><br><hr><br>";
    }
}

$list = [];
$list[] = new Contact("Kalil","kalil@gmail.com","(49) 1234-5678");
$list[] = new Contact("João","joao@hotmail.com","(55) 4321-8765");
$list[] = new Contact("Fabiano","fabiano@unoesc.com","(11) 4444-8888");

// Mostra detalhes da varivel de forma melhor
// Util para vizualizar arrays
// print_r($list);
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
        <h1>Contact List</h1>
        <?php
        foreach($list as $contact){
            echo $contact->show();
        }
        ?>
    </div>
</body>
</html>
