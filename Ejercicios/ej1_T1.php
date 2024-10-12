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
        <label for="num1">Numero 1</label>
        <input type="text" name="num1" id="num1"><br><br>
        <label for="num2">Numero 2</label>
        <input type="text" name="num2" id="num2"><br><br>
        <label for="num3">Numero 3</label>
        <input type="text" name="num3" id="num3"><br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $num3 = $_POST["num3"];

            /* $resultado = match(true) {
                $num1 < $num2 and $num3 < $num2 => "$num2 es el mayor",
                $num3 < $num1 and $num2 < $num1 => "$num1 es el mayor",
                $num2 < $num3 and $num1 < $num3 => "$num3 es el mayor"
            }; */

            if ($num1 < $num2 and $num3 < $num2){
                $resultado = "$num2 es el mayor";
            } elseif($num3 < $num1 and $num2 < $num1){
                $resultado = "$num1 es el mayor";
            } else {
                $resultado = "$num3 es el mayor";
            }

            echo "<h1>$resultado</h1>";
        }
    ?>
</body>
</html>