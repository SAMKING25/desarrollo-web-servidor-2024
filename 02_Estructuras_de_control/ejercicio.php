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

    <h3>Ejercicio 1</h3>
    <p>
        MOSTRAR LA FECHA ACTUAL CON EL SIGUIENTE FORMATO:
        Viernes 27 de Septiembre de 2024
        UTILIZAR LAS ESTRUCTURAS DE CONTROL
    </p>
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

    <h3>Ejercicio 2</h3>
    <p>MOSTRAR EN UNA LISTA LOS NUMEROS MULTIPLOS DE 3 
    USANDO WHILE E IF</p>
    <?php
        $i = 1;
        echo "<ul>";
        while($i <= 100):
            if ($i % 3 == 0):
                echo "<li>$i</li>";
            endif;
            $i++;
        endwhile;
        echo "</ul>";
    ?>

    <h3>Ejercicio 3</h3>
    <p>CALCULAR LA SUMA DE LOS NUMEROS PARES ENTRE 1 Y 20</p>
    
    <?php
        $i = 1;
        $suma = 0;
        while($i <= 20){
            if($i %2 == 0){
                $suma += $i;
            }
            $i++;
        }
        echo "<p>LA SUMA ES $suma</p>";
    ?>

    <h3>Ejercicio 4</h3>
    <p>CALCULAR EL FACTORIAL DE 6 CON WHILE</p>
    
    <?php
        $i = 1;
        $factorial = 6;
        $resultado = 1;
        while ($i <= $factorial){
            $resultado *= $i; #  resultado = resultado * i
            $i++;
        }
        echo "<p>EL FACTORIAL DE $factorial ES $resultado";
    
    ?>

    <h3>EJERCICIO 5</h3>
    <p>MUESTRA POR PANTALLA LOS 50 PRIMEROS NUMEROS PRIMOS</p>

    <?php
        $cont =0;
        echo "<ol>";
        for($num=2;$cont<50;$num++){
            for($i=2;$i<$num;$i++){
                if($num % $i == 0){break;}
            }
            if($i==$num){
                echo "<li>$num</li>";
                $cont++;
            }
        }
        echo "</ul>";
    ?>

</body>
</html>