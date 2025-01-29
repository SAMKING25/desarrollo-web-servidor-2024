<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del anime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
        $id = $_GET["id"];
        $apiUrl = "https://api.jikan.moe/v4/anime/$id/full";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $anime = $datos["data"];
        /* print_r($anime) */
    ?>
    <!-- 
    MOSTRAR:
    - titulo
    - nota
    - sinopsis
    - lista de generos
    - trailer (embed_id)
    - lista de animes relacionados
        + Solo el nombre del anime.
        + Solo se mostrarán los relacionados que sean de type anime
    - Añadir a los animes una lista con los productores de la serie.
      Los productores son las empresas encargadas en producir el anime.
      Una vez hecha la lista, mostraremos en un archivo productor.php el nombre por
      defecto del productor, su imagen y la información sobre el 
      productor que nos provee la api (about)
    -->

    <div class="container">
        <h1><?php echo $anime["title"] ?></h1>
        <img src="<?php echo $anime["images"]["jpg"]["image_url"]?>"><br>
        <h2>Nota media: <?php echo $anime["score"] ?></h2><br>
        <h2>Sinopsis:</h2>
        <p><?php echo $anime["synopsis"]?></p><br>
        <h2>Géneros:</h2>
        <ul class="list-group">
            <?php foreach($anime["genres"] as $genero) {  ?>
                <li class="list-group-item"><?php echo $genero["name"]?></li>
            <?php } ?>
        </ul><br>
        <h2>Relacionados:</h2>
        <ul class="list-group">
            <?php foreach($anime["relations"] as $relacionado) {
                    foreach($relacionado["entry"] as $entrada) {
                        if ($entrada["type"] == "anime") { ?>
                            <li class="list-group-item">
                                <a href="anime.php?id=<?php echo $entrada["mal_id"]?>">
                                    <?php echo $entrada["name"]?>
                                </a>    
                            </li>
                    <?php }
                    }
                } ?>
        </ul><br>
        <h2>Productores:</h2>
        <ul class="list-group">
            <?php foreach($anime["producers"] as $productor) {  ?>
                <li class="list-group-item">
                    <a href="productor.php?id=<?php echo $productor["mal_id"]?>">
                        <?php echo $productor["name"]?>
                    </a>
                </li>
            <?php } ?>
        </ul><br>
        <iframe width="500px" height="350px" src="<?php echo $anime["trailer"]["embed_url"]?>"></iframe>

    </div>
    
</body>
</html>