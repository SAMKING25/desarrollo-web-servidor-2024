<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );    
    ?>
</head>
<body>
    <!-- 
    Realiza un formulario que reciba dos números y devuelva 
    todos los números primos dentro de ese rango (incluidos los extremos). 
    -->

    <h2>Numeros Primos entre A y B</h2>
    <form action="" method="post">
        <label for="num1">Numero A</label>
        <input type="text" name="num1" id="num1"><br><br>
        <label for="num2">Numero B</label>
        <input type="text" name="num2" id="num2"><br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $primo = $_POST["num1"];
            $res = "";
            
            for($primo ;$primo <= $num2 ;$primo++){
                for($j=2 ;$j<=$primo; $j++){
                    if($primo % $j == 0){break;}
                    
                }
                if($primo==$j){
                    $res .= $primo.", ";
                    
                }
            }

            echo "<h2>Los numeros primos entre ambos numeros son: $res</h2>";
        }
    ?>



</body>
</html>