<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
</head>
<body>
    <!-- 
        CREAR UN FORMULARIO QUE RECIBA EL NOMBRE Y LA EDAD DE UNA PERSONA

        SI LA EDAD ES MENOR QUE 18 SE MOSTRARA EL NOMBRE Y MENOR DE EDAD

        SI LA EDAD ES MAS DE 65 , NOMBRE Y JUBILAO
    -->

    <form action="" method="post">
        <label for="nombre">Nombre</label> 
        <input type="text" name="nombre" id="nombre" placeholder="Introduce el nombre..">
        <br><br>
        <label for="expo">Edad</label> 
        <input type="text" name="edad" id="edad" placeholder="Introduce la edad..">
        <br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre = $_POST["nombre"];
            $edad = $_POST["edad"];

            $res = match(true){
                $edad < 18 => " es menor de edad",
                $edad >= 18 && $edad <= 65 => " es mayor de edad",
                $edad > 65 => " esta jubilado"
            };

            echo "$nombre,$res";

            /* if($edad < 18){
                echo "<h2>$nombre es Menor de edad</h2>";
            } elseif($edad > 65){
                echo "<h2>$nombre esta jubilao</h2>";
            } else{
                echo "<h2>$nombre es Mayor de edad</h2>";
            } */
        } 
    ?>
