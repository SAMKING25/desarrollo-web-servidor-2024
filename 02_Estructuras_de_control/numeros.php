<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números</title>
</head>
<body>
    <?php
        $numero = 0;

        if($numero > 0) {
            echo "<p>1 El numero $numero es mayor que cero</p>";
        } elseif ($numero == 0) {
            echo "<p>1 El numero $numero es igual a cero</p>";
        } else {
            echo "<p>1 El numero $numero menor que cero</p>";
        }
        
        if($numero > 0) echo "<p>2 El numero $numero es mayor que cero</p>";
        elseif($numero == 0) echo "<p>2 El numero $numero es igual a cero</p>";
        else echo "<p>2 El numero $numero es menor que cero</p>";

        if($numero > 0):
            echo "<p>3 El numero $numero es mayor que cero</p>";
        elseif ($numero == 0):
            echo "<p>3 El numero $numero es igual a cero</p>";
        else:
            echo "<p>3 El numero $numero es menor que cero</p>";
        endif;
    ?>

    <?php 
    #   Rangos [-10,0),[0,10],(10,20]

    $num = 7;

    #   and o && para la conjuncion

    // Forma 1 
    if($num >= -10 and $num < 0){
        echo "<p>El número $num esta en el rango [-10,0)</p>";
    } elseif($num >= 0 && $num <= 10){
        echo "<p>El número $num esta en el rango [0,10]</p>";
    } elseif($num > 10 && $num <= 20){
        echo "<p>El número $num esta en el rango (-10,20]</p>";
    } else{
        echo "<p>El numero $num esta fuera del rango</p>";
    }

    // Forma 2
    if($num >= 10 and $num < 0) echo "<p>El número $num esta en el rango [-10,0)</p>";
    elseif($num >= 0 and $num <= 10) echo "<p>El número $num esta en el rango [0,10]</p>";
    elseif($num > 10 and $num <= 20) echo "<p>El número $num esta en el rango (10,20]</p>";
    else echo "<p>El número $num esta fuera del rango</p>";

    // Forma 3
    if($num >= 10 and $num < 0):
        echo "<p>El número $num esta en el rango [-10,0)</p>";
    elseif ($num >= 0 and $num <= 10):
        echo "<p>El número $num esta en el rango [0,10]</p>";
    elseif ($num > 10 and $num <= 20):
        echo "<p>El número $num esta en el rango (10,20]</p>";
    else:
        echo "<p>El número $num esta fuera del rango</p>";
    endif;

    /*
        COMPROBAR DE TRES FORMAS DIFERENTES ,CON LA ESTRUCTURA IF,
        SI EL NUMERO ALEATORIO TIENE 1,2 O 3 DIGITOS
    */

    $numero_aleatorio = rand(1,200); //Incluye ambos números
    $numero_aleatorio_decimal = rand(10,100)/10;
    $digitos = null;

    if ($numero_aleatorio >= 100 && $numero_aleatorio <=200){
        $digitos = 3;
    } elseif ($numero_aleatorio >= 10 && $numero_aleatorio <= 99){
        $digitos = 2;
    } elseif ($numero_aleatorio < 10 && $numero_aleatorio >= 1){
        $digitos = 1;
    }

    $digitos_texto = "digitos";
    if ($digitos == 1) $digitos_texto = "digito";

    echo "<p>El numero $numero_aleatorio tiene $digitos $digitos_texto</p>";
    
    /*
        if ($numero_aleatorio >= 100 && $numero_aleatorio <=200) echo "<p>El numero tiene 3 digitos</p>";
        elseif ($numero_aleatorio >= 10 && $numero_aleatorio <= 99) echo "<p>El numero tiene 2 digitos</p>";
        elseif ($numero_aleatorio < 10 && $numero_aleatorio >= 1) echo "<p>El numero tiene 1 digitos</p>";

        if ($numero_aleatorio >= 100 && $numero_aleatorio <=200):
            echo "<p>El numero tiene 3 digitos</p>";
        elseif ($numero_aleatorio >= 10 && $numero_aleatorio <= 99):
            echo "<p>El numero tiene 2 digitos</p>";
        elseif ($numero_aleatorio < 10 && $numero_aleatorio >= 1):
            echo "<p>El numero tiene 1 digitos</p>";
        endif;
    */

    $n = rand(1,3);
    
    switch($n) {
        case 1:
            echo "El número es 1";
            break;
        case 2:
            echo "El número es 2";
            break;
        default:
            echo "El número es 3";
    }




    ?>
</body>
</html>