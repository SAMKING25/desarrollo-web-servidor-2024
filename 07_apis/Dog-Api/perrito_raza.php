<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perro al azar | Raza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <!-- api https://dog.ceo/dog-api/documentation/ -->
    <?php
        $apiUrl = "https://dog.ceo/api/breeds/list/all";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $razas = $datos["message"];

        if (isset($_GET['breed'])) {
            $razaSeleccionada = $_GET['breed'];
            $apiUrlImage = "https://dog.ceo/api/breed/$razaSeleccionada/images/random";
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $apiUrlImage);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuestaImage = curl_exec($curl);
            curl_close($curl);

            $datosImage = json_decode($respuestaImage, true);
            $image = $datosImage['message'];
        }
    ?>
    <div class="container">
        <form method="get" class="col-4">
            <label for="breed" class="form-label">Raza:</label>
            <select name="breed" id="breed" class="form-select">
                <?php
                    foreach($razas as $raza => $subRazas) {
                        if (empty($subRazas)) { ?>
                            <option value="<?php echo $raza ?>">
                                <?php echo $raza ?>
                            </option>
                        <?php } else {
                            foreach($subRazas as $subRaza) {
                                $mostrar_subRaza = $raza . " " . $subRaza;
                                $api_subRaza = $raza . "/" . $subRaza; ?>
                                <option value="<?php echo $api_subRaza ?>">
                                    <?php echo $mostrar_subRaza ?>
                                </option>
                        <?php }
                        }   
                    }   
                ?>
            </select><br>
            <input type="submit" value="Generar" class="btn btn-primary"><br><br>
        </form>

        <?php
        if (isset($image)) { ?>
            <img src="<?php echo $image ?>" class="img-fluid">
        <?php } ?>
    </div>
</body>
</html>