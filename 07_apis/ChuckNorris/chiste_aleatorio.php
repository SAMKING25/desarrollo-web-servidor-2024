<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chiste aleatorio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
        $apiUrlCategorias = "https://api.chucknorris.io/jokes/categories";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrlCategorias);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuestaCategorias = curl_exec($curl);
        curl_close($curl);

        $categorias = json_decode($respuestaCategorias, true);

        if (isset($_GET['categories'])) {
            $categoriaSeleccionada = $_GET['categories'];
            $apiUrlRandom = "https://api.chucknorris.io/jokes/random?category=$categoriaSeleccionada";
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $apiUrlRandom);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuestaRandom = curl_exec($curl);
            curl_close($curl);

            $datosRandom = json_decode($respuestaRandom, true);
            $chiste = $datosRandom['value'];
            $foto = $datosRandom['icon_url'];
        }
    ?>
    <div class="container">
        <form method="get" class="col-4">
            <label for="categories" class="form-label">Raza:</label>
            <select name="categories" id="categories" class="form-select">
                <?php
                    foreach($categorias as $categoria) { ?>
                        <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                    <?php } ?>   
            </select><br>
            <input type="submit" value="Generar" class="btn btn-primary"><br><br>
        </form>

        <?php
        if (isset($chiste)) { ?>
            <img src="<?php echo $foto ?>"><br>
            <p><?php echo $chiste ?></p>
        <?php } ?>
    </div>
</body>
</html>