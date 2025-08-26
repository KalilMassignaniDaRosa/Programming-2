<?php
class User{
    public string $name;
    private string $password;

    public function __construct(string $name, string $password){
        $this->name = $name;
        $this->password = $password;
    }


    // Por falta de tempo retornei string
    // se fosse bool precisaria de mais um metodo para transformar em escrita 
    public function verifyPassword(string $password): string{
        if ( $password == $this->password ){
            return "True";
        }else{
            return "False";
        }
    }
}

$u1 = new User("Kalil", 1234);

echo "<h1>User</h1>";
echo "<p>". $u1->verifyPassword(1234)."</p>";