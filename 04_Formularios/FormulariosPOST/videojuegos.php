<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );  
    ?>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_fecha_lanzamiento = $_POST["fecha_lanzamiento"];
        if(isset($_POST["consola"])) {
            $tmp_consola = $_POST["consola"];
        } else {
            $tmp_consola = "";
        }

        if($tmp_consola == '') {
            $err_consola = "La consola es obligatoria";
        } else {
            $consolas_validas = ["ps4", "ps5", "switch", "xboxsx"];
            if(!in_array($tmp_consola, $consolas_validas)) {
                $err_consola = "La consola no es válida";
            } else {
                $consola = $tmp_consola;
            }
        }

        if($tmp_fecha_lanzamiento == ''){
            $err_fecha_lanzamiento = "La fecha de lanzamiento es obligatoria";
        } else {
            $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if(!preg_match($patron,$tmp_fecha_lanzamiento)){
                $err_fecha_lanzamiento = "Formato de fecha incorrecto";
            } else {
                list($anio_lanzamiento,$mes_lanzamiento,$dia_lanzamiento) = 
                    explode('-',$tmp_fecha_lanzamiento);
                if($anio_lanzamiento < 1947){
                    $err_fecha_lanzamiento = "El año no puede ser anterior a 1947";
                } else {
                    $anio_actual = date('Y');
                    $mes_actual = date('m');
                    $dia_actual = date('d');

                    /* CONTROL AÑO */
                    if($anio_lanzamiento - $anio_actual < 5){
                       $fecha_lanzamiento = $tmp_fecha_lanzamiento; 
                    } elseif($anio_lanzamiento - $anio_actual > 5){
                        $err_fecha_lanzamiento = "La fecha debe ser anterior a 5 años";
                    } elseif($anio_lanzamiento-$anio_actual == 5){
                        /* CONTROL MES */
                        if($mes_lanzamiento - $mes_actual < 0 ){
                            $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                        }elseif($mes_lanzamiento - $mes_actual > 0){
                            $err_fecha_lanzamiento = "La fecha debe ser anterior a 5 años";
                        } elseif($mes_lanzamiento - $mes_actual == 0){
                            /* CONTROL DIA */
                            if($dia_lanzamiento - $dia_actual <= 0){
                                $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                            } elseif($dia_lanzamiento - $dia_actual > 0){
                                $err_fecha_lanzamiento = "La fecha debe ser anterior a dentro de 5 años";
                            }
                        }
                    }
                }
            }
        }
    }
    ?>
    <div class="container">
        <h1>Formulario de videojuegos</h1>
        <form class="col-4" action="" method="post">
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="consola" value="ps4">
                    <label for="" class="form-check-label">Playstation 4</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="consola" value="ps5">
                    <label for="" class="form-check-label">Playstation 5</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="consola" value="switch">
                    <label for="" class="form-check-label">Nintendo Switch</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="consola" value="xboxsx">
                    <label for="" class="form-check-label">Xbox Series X/S</label>
                </div>
                <?php if(isset($err_consola)) echo "<span class='error'>$err_consola</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha Lanzamiento</label>
                <input class="form-control" type="date" name="fecha_lanzamiento" value="fecha">
            </div>

            <?php if(isset($err_fecha_lanzamiento)) echo "<span class='error'>$err_fecha_lanzamiento</span>" ?>

            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Enviar">
            </div>
            
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>