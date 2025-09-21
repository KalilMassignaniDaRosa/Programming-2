<?php

class Calculator
{

    #region ErrorTools
    private ?string $lastError = null;

    public function getError(): ?string {
        return $this->lastError;
    }

    private function setError(string $msg): void {
        $this->lastError = $msg;
    }
    private function clearError(): void {
        $this->lastError = null;
    }
    #endregion

    #region Utils
    private static function isNumericArray($array): bool
    {
        if (!is_array($array))
            return false;

        if (count($array) === 0)
            return false;

        foreach ($array as $num) {
            if (!self::isNumber($num))
                return false;
        }

        return true;
    }

    // Foi criado pois o is_numeric aceita strings numericas
    private static function isNumber($num)
    {
        if (is_int($num) || is_float($num))
            return true;

        return false;
    }

    // ... aceita qualquer quantidade de args
    public function calculate(string $operation, ...$numbers)
    {
        switch ($operation) {
            case '+':
                return $this->sum(...$numbers);

            case '-':
                return $this->sub(...$numbers);

            case '*':
                return $this->mult(...$numbers);

            case '/':
                return $this->div(...$numbers);

            default:
                $this->setError("Operation not supported");
                return null;
        }
    }
    #endregion

    #region Operations
    public function sum($n1, $n2 = null, $n3 = null)
    {
        $this->clearError();
        // Array
        if ($n2 === null && self::isNumericArray($n1)) {
            $sum = 0.0;
            foreach ($n1 as $num) {
                $sum += $num;
            }

            return $sum;
        }

        // 2 num
        if ($n2 !== null && $n3 === null && self::isNumber($n1) && self::isNumber($n2))
            return $n1 + $n2;

        // 3 num
        if ($n3 !== null && self::isNumber($n1) && self::isNumber($n2) && self::isNumber($n3))
            return $n1 + $n2 + $n3;

        $this->setError("Type not supported");
        return null;
    }

    public function sub($n1, $n2 = null, $n3 = null)
    {
        $this->clearError();
        // Array
        if ($n2 === null && self::isNumericArray($n1)) {
            // Remove o primeiro
            $sub = array_shift($n1);

            foreach ($n1 as $num) {
                $sub -= $num;
            }

            return $sub;
        }

        // 2 num
        if ($n2 !== null && $n3 === null && self::isNumber($n1) && self::isNumber($n2))
            return $n1 - $n2;

        // 3 num
        if ($n3 !== null && self::isNumber($n1) && self::isNumber($n2) && self::isNumber($n3))
            return $n1 - $n2 - $n3;

        $this->setError("Type not supported");
        return null;
    }

    public function mult($n1, $n2 = null, $n3 = null)
    {
        $this->clearError();
        // Array
        if ($n2 === null && self::isNumericArray($n1)) {
            $mult = array_shift($n1);

            foreach ($n1 as $num) {
                $mult *= $num;
            }

            return $mult;
        }

        // 2 num
        if ($n2 !== null && $n3 === null && self::isNumber($n1) && self::isNumber($n2))
            return $n1 * $n2;

        // 3 num
        if ($n3 !== null && self::isNumber($n1) && self::isNumber($n2) && self::isNumber($n3))
            return $n1 * $n2 * $n3;

        $this->setError("Type not supported");
        return null;
    }

    public function div($n1, $n2 = null, $n3 = null)
    {
        $this->clearError();
        // Array
        if ($n2 === null && self::isNumericArray($n1)) {;
            $div = array_shift($n1);

            foreach ($n1 as $num) {
                if ($num == 0) {
                    $this->setError("Division by 0 not supported");
                    return null;
                }
                $div /= $num;
            }

            return $div;
        }

        // 2 num
        if ($n2 !== null && $n3 === null && self::isNumber($n1) && self::isNumber($n2)) {
            if ($n2 == 0) {
                $this->setError("Division by 0 not supported");
                return null;
            }

            return $n1 / $n2;
        }

        // 3 num
        if ($n3 !== null && self::isNumber($n1) && self::isNumber($n2) && self::isNumber($n3)) {
            if ($n2 == 0 || $n3 == 0) {
                $this->setError("Division by 0 not supported");
                return null;
            }

            return $n1 / $n2 / $n3;
        }

        $this->setError("Type not supported");
        return null;
    }
    #endregion
}
