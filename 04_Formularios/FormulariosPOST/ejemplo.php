<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <form action="" method="post">
        <p>Mensaje <input tupe="text" name="mensaje"></p>
        <p>Numero de veces <input tupe="text" name="numero"></p>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            /**
             * Estecodigo se ejecuta cuando el servidor recibe informacion
            */
            $mensaje = $_POST["mensaje"];
            $numero = $_POST["numero"];
            for($i = 0; $i< $numero;$i++){
                echo "<h1>$mensaje</h1>";
            }


        }
    ?>
</body>
</html>