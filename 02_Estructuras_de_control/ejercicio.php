<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>

    <!--
        EJERCICIO 1 : MOSTRAR LA FECHA ACTUAL CON EL SIGUIENTE FORMATO:
            Viernes 27 de Septiembre de 2024
        UTILIZAR LAS ESTRUCTURAS DE CONTROL
    -->

    <?php
        
        $fecha = date('l jS \of F Y ');

        $dia = date('l');
        $num_dia = date('j');
        $mes = date('F');
        $anio = date('Y');

        $dia = match($dia) {
            "Monday" => "Lunes",
            "Tuesday" => "Martes",
            "Wednesday" => "Miercoles",
            "Thursday" => "Jueves",
            "Friday" => "Viernes",
            "Saturday" => "Sabado",
            "Sunday" => "Domingo"
        };
        $mes = match($mes) {
            "January" => "Enero",
            "February" => "Febrero",
            "March" => "Marzo",
            "April" => "Abril",
            "May" => "Mayo",
            "June" => "Junio",
            "July" => "Julio",
            "August" => "Agosto",
            "September" => "Septiembre",
            "October" => "Octubre",
            "November" => "Noviembre",
            "December" => "Diciembre",
        };

        echo "$dia $num_dia de $mes de $anio"
    ?>

    <!--
        EJERCICIO 2: MOSTRAR EN UNA LISTA LOS NUMEROS MULTIPLOS DE 3 
        USANDO WHILE E IF
    -->

    <!--
        EJERCICIO 3: CALCULAR LA SUMA DE LOS NUMEROS PARES ENTRE 1 Y 20
    -->
        
    <!--
        EJERCICIO 4: CALCULAR EL FACTORIAL DE 6 CON WHILE
    -->
</body>
</html>