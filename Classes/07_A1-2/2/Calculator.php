<?php

class Calculator
{
    #region Utils
    private static function isNumericArray($array):bool{
        if(!is_array($array)){
            return false;
        }

        foreach($array as $num){
            if(!self::isNumber( $num)){
                return false;
            }
        }

        return true;
    }

    // Foi criado pois o is_numeric aceita strings numericas   
    private static function isNumber($num){
        if(is_int($num) || is_float($num))
            return true;

        return false;
    }
    #endregion

    public function sum():float{
        $argsNum = func_num_args();
        $args = func_get_args(); // é uma array de array
        $sum = 0.0;

        // colocar um metodo para verificar todas as entradas

        // Caso seja um array de numeros
        if($argsNum === 1 && self::isNumericArray($args[0])){
            foreach($args[0] as $nums){
                $sum += $nums;
            }

            return $sum;
        }
        // Caso seja 2 numeros 
        elseif($argsNum === 2 && self::isNumber($args[0][0]) 
            && self::isNumber($args[0][1])){
            $sum = $args[0][0] + $args[0][1];
            
            return $sum;
        }
        elseif($argsNum === 3 && self::isNumber($args[0]) 
            && self::isNumber($args[1] && self::isNumber($args[1]))){
            $sum = $args[0] + $args[1] + $args[2];
            
            return $sum;
        }
        else{
            echo "<p>Type not supported</p>";
            return 0.0;
        }
    }

    public function sub():float{
        $argsNum = func_num_args();
        $args = func_get_args();
        $sum = 0.0;

        // Caso seja um array de numeros
        if($argsNum === 1 && self::isNumericArray($args)){
            foreach($args as $nums){
                $sum -= $nums;
            }

            return $sum;
        }
        // Caso seja 2 numeros 
        elseif($argsNum === 2 && self::isNumber($args[0]) 
            && self::isNumber($args[1])){
            $sum = $args[0] - $args[1];
            
            return $sum;
        }
        elseif($argsNum === 3 && self::isNumber($args[0]) 
            && self::isNumber($args[1] && self::isNumber($args[1]))){
            $sum = $args[0] - $args[1] - $args[2];
            
            return $sum;
        }
        else{
            echo "<p>Type not supported</p>";
            return 0.0;
        }
    }
}
