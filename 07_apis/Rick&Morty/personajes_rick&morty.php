<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Personajes Rick & Morty</title>
</head>
<body>
     <!-- api --   https://rickandmortyapi.com/documentation/  -->
    <?php
        $apiUrl = "https://rickandmortyapi.com/api/character";
        $cantidad = isset($_GET["cantidad"]) && $_GET["cantidad"] != "" ? (int)$_GET["cantidad"] : 20;
        $genero = isset($_GET["gender"]) ? $_GET["gender"] : "";
        $especie = isset($_GET["species"]) ? $_GET["species"] : "";

        if(isset($cantidad) && isset($genero) && isset($especie)){
            $apiUrl = "https://rickandmortyapi.com/api/character?gender=$genero&species=$especie";
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $personajes = $datos["results"];

    ?>
    <form method="get">
        <label>¿Cuantos personajes quieres ver?</label>
        <input type="text" name="cantidad">
        <br>
        <label>Genero: </label>
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <br>
        <label>Especie: </label>
        <select name="species">
            <option value="human">Human</option>
            <option value="alien">Alien</option>
        </select>
        <br>
        <input type="submit" value="Buscar">
    </form>
    <br>
    <h2>Tabla de personajes Rick & Morty</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Genero</th>
                <th scope="col">Especie</th>
                <th scope="col">Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($cantidad > count($personajes)) $cantidad=count($personajes); 
                for($i=0; $i<$cantidad; $i++) { ?>
                    <tr>
                        <td scope="row"><?php echo $personajes[$i]["name"]?></td>
                        <td scope="row"><?php echo $personajes[$i]["gender"]?></td>
                        <td scope="row"><?php echo $personajes[$i]["species"]?></td>
                        <td scope="row">
                            <img width="100px" src="<?php echo $personajes[$i]["image"]?>">
                        </td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
</body>
</html>