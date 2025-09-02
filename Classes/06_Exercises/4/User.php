<?php
class User{
    public string $name;
    private string $password;

    public function __construct(string $name, string $password){
        $this->name = $name;
        $this->password = $password;
    }

    public function verifyPassword(string $password): bool{
        if ( $password == $this->password ){
            return true;
        }else{
            return false;
        }
    }

    public function stringVefiryPassword(string $password):string{
        if($this->verifyPassword($password)){
            return "True";
        }else{
            return "False";
        }
    }
}

$u1 = new User("Kalil", 1234);

echo "<h1>User</h1>";
echo "<p>". $u1->stringVefiryPassword(1234)."</p>";