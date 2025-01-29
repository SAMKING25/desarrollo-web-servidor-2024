<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del productor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
        $id = $_GET["id"];
        $apiUrl = "https://api.jikan.moe/v4/producers/$id/full";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $productor = $datos["data"];
        /* print_r($productor) */
    ?>
    <!-- 
    MOSTRAR:
    - titulo
    - nota
    - sinopsis
    - lista de generos
    - trailer (embed_id)
    - lista de animes relacionados
        + Solo el nombre del productor.
        + Solo se mostrarán los relacionados que sean de type productor
    - Añadir a los animes una lista con los productores de la serie.
      Los productores son las empresas encargadas en producir el productor.
      Una vez hecha la lista, mostraremos en un archivo productor.php el nombre por
      defecto del productor, su imagen y la información sobre el 
      productor que nos provee la api (about)
    -->

    <div class="container">
        <h1><?php echo $productor["titles"]["0"]["title"] ?></h1>
        <img src="<?php echo $productor["images"]["jpg"]["image_url"]?>"><br>
        <h2>Acerca de:</h2>
        <p><?php echo $productor["about"]?></p><br>
    </div>
    
</body>
</html>