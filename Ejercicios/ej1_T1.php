<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );    
    ?>
</head>
<body>
    <!-- Realiza un formulario que reciba 3 números y devuelva el mayor de ellos. -->

    <h2>Calcula el numero mayor</h2>
    <form action="" method="post">
        <label>Numero 1</label>
        <input type="text" name="num1"><br><br>
        <label>Numero 2</label>
        <input type="text" name="num2"><br><br>
        <label>Numero 3</label>
        <input type="text" name="num3"><br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $num3 = $_POST["num3"];

            /* if ($num1 < $num2 and $num3 < $num2){
                $resultado = "$num2 es el mayor";
            } elseif($num3 < $num1 and $num2 < $num1){
                $resultado = "$num1 es el mayor";
            } else {
                $resultado = "$num3 es el mayor";
            } */

            $max = $num1;

            if($num2 > $max){
                $max = $num2;
            }

            if($num3 > $max){
                $max = $num3;
            }

            echo "<h3>$max es el mayor</h3>";
        }
    ?>
</body>
</html>