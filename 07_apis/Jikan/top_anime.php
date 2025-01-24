<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jikan</title>
    <?php 
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php 
        $apiUrl = "https://api.jikan.moe/v4/top/anime";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $animes = $datos["data"];
        // print_r($animes);
    ?>
    <ol>
        <?php
        foreach($animes as $anime) { ?>
            <li><?php echo $anime["title"] ?></li>
        <?php } ?>
    </ol>

    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Ciudad</th>
                <th>Imagen</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($estudios as $estudio) { ?>
                <tr>
                    <td><?php echo $estudio["nombre_estudio"] ?></td>
                    <td><?php echo $estudio["ciudad"] ?></td>
                    <td><?php echo $estudio["anno_fundacion"] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>