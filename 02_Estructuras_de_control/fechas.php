<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
</head>
<body>
        <?php
        $numero = "2";
        $numero = (int) $numero;

        if($numero === 2){
            echo "EXITO";
        } else{
            echo "NO EXITO";
        }

        /*
            "2" == 2    "2" es igual que 2      
            "2" !== 2   "2" no es identico a 2
            2 === 2     2 si es identico 2
            2 !== 2.0   2 no es identico a 2.0
        */

        $hora = (int)date("G");
        //var_dump($hora);

        /*
            SI $hora ENTRE 6 Y 11 , ES MAÑANA 
            SI $hora ENTRE 12 Y 14 , ES MEDIODIA
            SI $hora ENTRE 15 y 20, ES TARDE
            SI $hora ENTRE 21 Y 0 , ES NOCHE
            SI $hora ENTRW 1 Y 5, ES MADRUGADA
        */

        if ($hora >= 6 && $hora <= 11){
            echo "Son las $hora , es por la mañana";
        } elseif ($hora >= 12 && $hora <= 14){
            echo "Son las $hora , es mediodia";
        } elseif ($hora >= 15 && $hora <= 20){
            echo "Son las $hora , es por la tarde";
        } elseif ($hora >= 21 || $hora == 0){
            echo "Son las $hora , es de noche";
        } elseif ($hora >= 1 && $hora <= 5){
            echo "Son las $hora , es de madrugada";
        } 

        $hora_exacta = date("H:i:s");

        echo "<h1>$hora_exacta</h1>";

        $dia = date("l");
        echo "<h2>Hoy es $dia</h2>";

        /*
            TENEMOS CLASE LUNES , MIERCOLES Y VIERNES
            NO TENEMOS CLASE EL RESTO

            HACER UN SWITCH QUE DIGA SI HOY TENEMOS CLASE
        */

        switch ($dia) {
            case 'Monday':
                echo "<p>Hoy es Lunes y hay clase de servidor</p>";
                break;
            case 'Wednesday':
                echo "<p>Hoy es Miercoles y hay clase de servidor</p>";
                break;
            case 'Friday':
                echo "<p>Hoy es Viernes y hay clase de servidor</p>";
                break;
            default:
                echo "<p>Hoy no hay clase de servidor";
        }

        switch ($dia) {
            case 'Monday':
            case 'Wednesday':
            case 'Friday':
                echo "<p>Hoy hay clase de servidor</p>";
                break;
            default:
                echo "<p>Hoy no hay clase de servidor";
        }

        

        ?>

</body>
</html>