<?php
    function calcPotencia(int $base,int $expo) : int{
        $resultado = 1;

        for($i = 0; $i< $expo;$i++){
            $resultado *= $base;
        }
        return $resultado ;
    }
?>