<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );    
    ?>
</head>
<body>
    <!-- 
        Realiza un formulario que funcione a modo de conversor de temperaturas. 
        Se introducirá en un campo de texto la temperatura, y luego tendremos un select
        para elegir las unidades de dicha temperatura, y otro select para elegir 
        las unidades a las que queremos convertir la temperatura.

        Por ejemplo, podemos introducir "10", y seleccionar "CELSIUS", y luego "FAHRENHEIT".
        Se convertirán los 10 CELSIUS a su equivalente en FAHRENHEIT.

        En los select se podrá elegir entre: CELSIUS, KELVIN y FAHRENHEIT.
    -->
    <h1>Transformador de temperaturas</h1>
    <form action="" method="post">
        <label for="temp">Temperatura: </label>
        <input type="text" name="temp" id="temp">
        <br><br>
        <select name="tipo1">
            <option value="celsius">Celsius</option>
            <option value="kelvin">Kelvin</option>
            <option value="fahrenheit">Fahrenheit</option>
        </select>
        <select name="tipo2">
            <option value="celsius">Celsius</option>
            <option value="kelvin">Kelvin</option>
            <option value="fahrenheit">Fahrenheit</option>
        </select>
        <br><br>
        <input type="submit" value="Transformar">
    </form>

    <!-- 
        Para convertir de ºC a ºF use la fórmula:   ºF = ºC x 1.8 + 32.
        Para convertir de ºF a ºC use la fórmula:   ºC = (ºF-32) ÷ 1.8.
        Para convertir de K a ºC use la fórmula:   ºC = K – 273.15
        Para convertir de ºC a K use la fórmula: K = ºC + 273.15.
        Para convertir de ºF a K use la fórmula: K = 5/9 (ºF – 32) + 273.15.
        Para convertir de K a ºF use la fórmula:   ºF = 1.8(K – 273.15) + 32
    -->

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp = $_POST["temp"];
        $tipo1 = $_POST["tipo1"];
        $tipo2 = $_POST["tipo2"];

        switch ($tipo1) {
            case 'celsius':
                if($tipo2 == "kelvin"){
                    $res = $temp + 273.15;
                } elseif($tipo2 == "fahrenheit"){
                    $res = ($temp * 1.8)+32;
                } else{
                    $res = $temp;
                }
                break;
            case 'kelvin':
                if($tipo2 == "celsius"){
                    $res = $temp - 273.15;
                } elseif($tipo2 == "fahrenheit"){
                    $res = 1.8*($temp - 273.15)+32;
                } else{
                    $res = $temp;
                }
                break;
            case 'fahrenheit':
                if($tipo2 == "celsius"){
                    $res = ($temp-32) / 1.8;
                } elseif($tipo2 == "kelvin"){
                    $res = 5/9*($temp - 32)+273.15;
                } else{
                    $res = $temp;
                }
                break;
            default:
                echo "No es ninguna opcion";
        }

        echo "<p>$temp $tipo1 son: $res $tipo2</p>";
    }
    ?>
</body>
</html>