<?php
class Client{
    private string $name;
    private string $cpf;

    public function __construct(string $name, string $cpf){
        $this->name = $name;
        $this->setCpf($cpf);
    }

    #region Getters
    public function getName(): string{
        return $this->name;
    }

    public function getCpf(): string{
        return $this->cpf;
    }
    #endregion

    #region Setters
    public function setName(string $name):void{
        $this->name = $name;
    }

    public function setCpf(string $cpf):void{
        $cpfFormatted = $this->cpfFormater($cpf);

        if($this->cpfValidate($cpfFormatted)){
            $this->cpf = $cpfFormatted;
        }else{
            echo "<p>Error: Cpf format invalid</p>";
        }
    }
    #endregion

    public function cpfFormater(string $cpf):string{
        $cpfFormatted = 
        substr($cpf,0,3). '.'.
        substr($cpf,3,3). '.' . 
        substr($cpf,6,3). '-'.
        substr($cpf,9,2);

        return $cpfFormatted;
    }

    // Precisa ter o cpf validado antes
    public function cpfValidate(string $cpfFormatted):bool{
        //echo "<p>Debug: string lenght: ".mb_strlen($cpfFormatted)."</p>";
        //echo "<p>Cpf: ".$cpfFormatted."</p>";

        if(mb_strlen($cpfFormatted) == 14){
            return true;
        }else{
            return false;
        }
    }
}

$c1 = new Client("Kalil","12345678910");
echo "<h1>Client</h1>";

echo "<p>Name: ".$c1->getName()."</p>";
echo "<p>Cpf: ".$c1->getCpf()."</p>";
$c1->setCpf("12345678912");
echo "<p>New cpf: ".$c1->getCpf()."</p>";