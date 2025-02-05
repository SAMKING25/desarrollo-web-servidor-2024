<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex completa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
        $id = $_GET["id"];
        $apiUrl = "https://pokeapi.co/api/v2/pokemon/$id/";
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
    ?>
    <div>
        <img width="200px" src="<?php echo $datos["sprites"]["other"]["dream_world"]["front_default"]?>" class="img-fluid">
        <div id="details">
            <h3><?php echo ucwords($datos["name"])?></h3>
        </div><br>
        <a href="./index.php" class="btn btn-primary">Volver</a>
    </div>
</body>
</html>