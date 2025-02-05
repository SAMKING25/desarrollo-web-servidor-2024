<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemons</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
        $limit = isset($_GET["limit"]) ? (int)$_GET["limit"] : 5;
        $offset = isset($_GET["offset"]) ? (int)$_GET["offset"] : 0;
        $apiUrl = "https://pokeapi.co/api/v2/pokemon?limit=$limit&offset=$offset";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $pagination = $datos;
        $pokemons = $datos["results"];
    ?>
    <form method="get">
        <label>¿Cuantos Pokémons quieres mostrar?</label>
        <input type="number" name="limit">
        <input type="submit" value="Mostrar">
        <br><br>
    </form>
    <table>
        <thead>
            <tr>
                <th>Pokemon</th>
                <th>Imagen</th>
                <th>Tipos</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($pokemons as $pokemon) { ?>
                    <tr>
                        <td>
                            <?php echo ucwords($pokemon["name"])?>
                        </td>
                        <td>
                            <?php $imagenUrl=$pokemon["url"];
                                $curl = curl_init();
                                curl_setopt($curl, CURLOPT_URL, $imagenUrl);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                $respuesta = curl_exec($curl);
                                curl_close($curl);
                        
                                $datosPokemon = json_decode($respuesta, true);
                            ?>
                            <img src="<?php echo $datosPokemon["sprites"]["front_default"]?>">
                        </td>
                        <td><?php
                            $tipos = $datosPokemon["types"];
                            foreach($tipos as $tipo){
                                echo ucwords($tipo["type"]["name"]." ");                                   
                            } 

                            ?></td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
    <?php
        
        if(isset($pagination["previous"])){ ?>
           <a href="?limit=<?php echo $limit ?>&offset=<?php echo $offset-$limit ?>">Anterior</a>
    <?php } 
        if(isset($pagination["next"])){ ?>
            <a href="?limit=<?php echo $limit ?>&offset=<?php echo $offset+$limit ?>">Siguiente</a>
    <?php } ?>
</body>
</html>