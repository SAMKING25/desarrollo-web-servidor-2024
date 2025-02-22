<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Anime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    
    <?php
        $apiUrl = "https://api.jikan.moe/v4/top/anime";
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;
        $tipo = isset($_GET["type"]) ? $_GET["type"] : "";

        if(isset($_GET["page"]) && isset($_GET["type"])){
            $apiUrl = "https://api.jikan.moe/v4/top/anime?page=$page&type=$tipo";
        }
        elseif(isset($_GET["page"])){
            $apiUrl = "https://api.jikan.moe/v4/top/anime?page=$page";
        }
        elseif(isset($_GET["type"])){
            $apiUrl = "https://api.jikan.moe/v4/top/anime?type=$tipo";
        }
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $animes = $datos["data"];
        $pagination = $datos["pagination"];
    ?>
    <form method="get">
        <h2>Tipo de filtro:</h2>
        <label>Peliculas</label>
        <input type="radio" name="type" value="movie"><br>
        <label>Serie</label>
        <input type="radio" name="type" value="tv"><br>
        <label>Todos</label>
        <input type="radio" name="type" value=""><br>
        <input type="submit" value="Enviar">
    </form>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Posición</th>
                <th scope="col">Título</th>
                <th scope="col">Nota</th>
                <th scope="col">Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($animes as $anime) { ?>
                    <tr>
                        <td scope="row"><?php echo $anime["rank"]?></td>
                        <td>
                            <a href="anime.php?id=<?php echo $anime["mal_id"]?>">
                                <?php echo $anime["title"]?>
                            </a>
                        </td scope="row">
                        <td scope="row"><?php echo $anime["score"]?></td>
                        <td scope="row">
                            <img width="100px" src="<?php echo $anime["images"]["jpg"]["image_url"]?>">
                        </td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
    <?php
        if($pagination["current_page"] > 1){ ?>
            <a href="?page=<?php echo $page-1 ?>&type=<?php echo $tipo ?>" class="btn btn-primary">Anterior</a>
    <?php } 
        if($pagination["has_next_page"]){ ?>
            <a href="?page=<?php echo $page+1 ?>&type=<?php echo $tipo ?>" class="btn btn-success">Siguiente</a>
    <?php } ?>
    <select>
        <option></option>
    </select>
    
</body>
</html>