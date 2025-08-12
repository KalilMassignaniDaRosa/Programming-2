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

}

$list = array();
$c1 = new Contact("Kalil","kalil@gmail.com","(49) 1234");
$list[] = $c1;

$c2 = new Contact("João","joão@hotmail.com","(55) 4321");
$c3 = new Contact("Fabiano","fabiano@unoesc.com","(11) 4444");

$list[] = $c2;
$list[] = $c3;

// Mostra detalhes da varivel de forma melhor
// Util para vizualizar arrays
print_r($list);