<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Estudio</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );  
    ?>
    <style>
        .error{
            color: red;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tmp_nombre_estudio = $_POST['nombre_estudio'];
    $tmp_ciudad = $_POST['ciudad'];

    if($tmp_nombre_estudio == ""){
        $err_nombre_estudio = "Nombre de estudio es obligatorio";
    } else{
        if (!preg_match("/^[a-zA-Z0-9 ]+$/", $tmp_nombre_estudio)) {
            $err_nombre_estudio = "El nombre del estudio solo puede contener letras, números y espacios.";
        } else{
            $nombre_estudio = $tmp_nombre_estudio;
        }
    }
    

    if($tmp_ciudad == ""){
        $err_ciudad = "Ciudad es obligatoria";
    } else {
        if (!preg_match("/^[a-zA-Z ]+$/", $tmp_ciudad)) {
            $err_ciudad = "La ciudad solo puede contener letras y espacios.";
        } else{
            $ciudad = $tmp_ciudad;
        }
    }
}
?>
    <div class="container">
        <h1>Registrar Nuevo Estudio de Animación</h1>
        <form action="" method="POST" class="col-4">
            <div class="mb-3">
                <label class="form-label">Nombre del Estudio:</label>
                <input type="text"  name="nombre_estudio" class="form-control">
                <?php if(isset($err_nombre_estudio)) echo "<span class='error'>$err_nombre_estudio</span>"; ?>
            </div>  
            <div class="mb-3">
                <label class="form-label">Ciudad:</label>
                <input type="text" name="ciudad" class="form-control">
                <?php if(isset($err_ciudad)) echo "<span class='error'>$err_ciudad</span>"; ?>
            </div>
            
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Registrar estudio">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>