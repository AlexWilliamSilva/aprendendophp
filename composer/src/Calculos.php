<?php

class Calculos {

    public function add(int $numero1, int $numero2)
    {
        return $numero1 * $numero2;
    }

    public function isNull(string $texto){
        if($texto == null || empty($texto)){
            return true;
        } else {
            return false;
        }
    }

    public function CalcArray($numero1)
    {
        return count($numero1);
    }
}