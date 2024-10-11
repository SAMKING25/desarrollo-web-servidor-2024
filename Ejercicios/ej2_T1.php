<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );    
    ?>
</head>
<body>
    <!-- 
        Realiza un formulario que reciba 3 números: a, b y c. 
        Se mostrarán en una lista los múltiplos de c que se encuentren entre a y b.
        Por ejemplo, si a = 3, b = 10, c = 2

        Los múltiplos de 2 entre 3 y 10 son: 4, 6, 8 y 10
    -->

    <form action="" method="post">
        <label for="a">Numero A</label>
        <input type="text" name="a" id="a"><br><br>
        <label for="b">Numero B</label>
        <input type="text" name="b" id="b"><br><br>
        <label for="c">Numero C</label>
        <input type="text" name="c" id="c"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $a = $_POST["a"];
            $b = $_POST["b"];
            $c = $_POST["c"];
            $mults = $_POST["c"];
            $resultado = "";

            for($i = 0 ;$i <= ($b-$a) ;$i++){
                if ($mults >= $a and $mults <= $b){
                    $resultado = $resultado.$mults.", ";  
                    $mults+=$c;
                } else{
                    $mults+=$mults;
                } 
            }

            echo "<h1>Los multiplos de $c entre $a y $b son: $resultado</h1>";
        }
    ?>
</body>
</html>