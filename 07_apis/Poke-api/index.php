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
        $apiUrl = "https://pokeapi.co/api/v2/pokedex/1/";
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $pokemons = $datos["pokemon_entries"];
    ?>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Orden</th>
                <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($pokemons as $pokemon) { ?>
                    <tr>
                        <td scope="row">
                            <?php echo $pokemon["entry_number"]?>
                        </td>
                        <td scope="row">
                            <a href="./pokemon_info.php?id=<?php echo $pokemon["entry_number"]?>">
                                <?php echo ucwords($pokemon["pokemon_species"]["name"])?>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
</body>
</html>