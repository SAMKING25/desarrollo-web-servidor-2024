<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Liga</title>
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
    <!--
        Equipos de la liga
        - Nombre (letras con tilde, ñ, espacios en blanco y punto)
        - Inicial (3 letras)
        - Liga (select con las opciones: Liga EA Sports, Liga Hypermotion, Liga Primera RFEF)
        - Ciudad (letras con tilde, ñ, ç y espacios en blanco)
        - Tiene titulo liga (select con si o no)
        - Fecha de fundación (entre hoy y el 18 de diciembre de 1889)
        - Número de jugadores (entre 19 y 32)
    -->

    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_nombre = $_POST["nombre"];
            $tmp_iniciales = $_POST["iniciales"];

            if($tmp_nombre == ''){
                $err_nombre = "El nombre es obligatorio";
            } else{
                if(strlen($tmp_nombre) < 2 || strlen($tmp_nombre) > 40){
                    $err_nombre = "El nombre debe tener entre 2 y 40 caracteres";
                } else{
                    $patron = "/^[a-zA-Z nÑ.çáéíóúÁÉÍÓÚ]+$/";
                    if(!preg_match($patron,$tmp_nombre)){
                        $err_nombre = "El nombre solo puede contener letras y espacios";
                    } else{
                        $nombre = ucwords(strtolower($tmp_nombre));
                    }
                }
            } 
            
            if($tmp_iniciales == ''){
                $err_iniciales = "Las iniciales son obligatorio";
            } else{
                if(strlen($tmp_iniciales) !== 3){
                    $err_iniciales = "Las iniciales tienen 3 caracteres";
                } else{
                    $patron = "/^[A-Za-z]{3}+$/";
                    if(!preg_match($patron,$tmp_iniciales)){
                        $err_iniciales = "Las iniciales solo puede contener 3 letras mayusculas";
                    } else{
                        $iniciales = strtoupper($tmp_iniciales);
                    }
                }
            } 
        }
    ?>

    <h1>Formulario La Liga</h1>
    <form class="col-4" action="" method="post">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre">
            <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Iniciales</label>
            <input type="text" class="form-control" name="iniciales">
            <?php if(isset($err_iniciales)) echo "<span class='error'>$err_iniciales</span>"; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Liga</label>
            <select name="liga">
                <option disabled selected hidden>-- Elige la Liga --</option>
                <option value="liga_ea">Liga EA Sports</option>
                <option value="liga_hyper">Liga Hypermotion</option>
                <option value="liga_rfef">Liga Primera RFEF</option>
            </select>
            <?php if(isset($err_liga)) echo "<span class='error'>$err_liga</span>"; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Ciudad</label>
            <input type="text" class="form-control" name="ciudad">
            <?php if(isset($err_ciudad)) echo "<span class='error'>$err_ciudad</span>"; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Titulo Liga</label>
            <select name="liga">
                <option value="si">Si</option>
                <option value="no">no</option>
            </select>
            <?php if(isset($err_liga)) echo "<span class='error'>$err_liga</span>"; ?>
        </div>
        <div class="mb-3">
                <label class="form-label">Fecha Fundacion</label>
                <input class="form-control" type="date" name="fecha_fundacion" value="fecha">
        </div>
        <?php if(isset($err_fecha_fundacion)) echo "<span class='error'>$err_fecha_fundacion</span>" ?>
        <div class="mb-3">
            <label class="form-label">Número de Jugadores</label>
            <input type="text" class="form-control" name="jugadores">
            <?php if(isset($err_jugadores)) echo "<span class='error'>$err_jugadores</span>"; ?>
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Enviar">
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
</body>
</html>