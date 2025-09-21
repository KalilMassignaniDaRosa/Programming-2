<?php
class Caculator{
    public float $value1;
    public float $value2;
    public float $result;

    public function __construct($value1,$value2, $result){
        $this->value1 = $value1;
        $this->value2 = $value2;
        $this->result = $result;
    }

    #region Operations
    public function addition($value1,$value2) : string{
        $this->value1 = $value1;
        $this->value2 = $value2;
        $this->result = $value1 + $value2;

        return $this->showOperation("+");
    }

    public function subtraction($value1,$value2) : string{
        $this->value1 = $value1;
        $this->value2 = $value2;
        $this->result = $value1 - $value2;

        return $this->showOperation("-");;
    }

    public function multiply($value1,$value2) : string{
        $this->value1 = $value1;
        $this->value2 = $value2;
        $this->result = $value1 * $value2;

        return $this->showOperation("*");
    }

    public function divide($value1,$value2) : string{
        $this->value1 = $value1;
        $this->value2 = $value2;
        $this->result = $value1 / $value2;

        return $this->showOperation("/");
    }
    #endregion

    #region Utils
   public function showOperation($op): string {
        return "{$this->value1} <span class='highlight'>{$op}
        </span> {$this->value2} = <strong>{$this->result}</strong><br>";
    }

    public function clear() : string{
        $this->result = 0;
        $this->value1 = 0;
        $this->value2 = 0;

        return "<br>
        <span class='success'>
        <p>Values cleared!</p>
        </span>";
    }
    #endregion
}

$calc = new Caculator(0,0,0);

$results = "";
// .= atribui e concatena
$results .= $calc->addition(5,2);
$results .= $calc->multiply($calc->result,5);
$results .= $calc->divide($calc->result,11);
$results .= $calc->clear();
$results .= $calc->subtraction(5000,1234);
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
        <h1>Calculator Operations</h1>
        <?= $results ?>
    </div>
</body>
</html>
