<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion Animes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 ); 
        require('conexion.php'); 
    ?>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <?php 
        function depurar(string $entrada) : string{
            $salida = htmlspecialchars($entrada);
            $salida = trim($salida);
            $salida = preg_replace('!\s+!',' ',$salida);
            return $salida;
        }
    ?>

    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_titulo = depurar($_POST["titulo"]);
            $tmp_nombre_estudio = depurar($_POST["nombre_estudio"]); 
            $tmp_anno_estreno = depurar($_POST["anno_estreno"]);
            $tmp_num_temporadas = depurar($_POST["num_temporadas"]);
            /**
             * $_FILES -> que es un array bidimensional
            */
            // var_dump($_FILES["imagen"]);
            $nombre_imagen = $_FILES["imagen"]["name"];
            $ubicacion_temporal = $_FILES["imagen"]["tmp_name"];
            $ubicacion_final = "./imagenes/$nombre_imagen";

            move_uploaded_file($ubicacion_temporal, $ubicacion_final);

            if($tmp_titulo == ''){
                $err_titulo = "El titulo tiene que ser obligatorio";
            } else {
                if(strlen($tmp_titulo) > 80){
                    $err_titulo = "El titulo no puede tener mas de 80 caracteres";
                } else{
                    $titulo = $tmp_titulo;
                }
            }

            if($tmp_nombre_estudio == ""){
                $err_nombre_estudio = "El nombre del estudio es obligatorio";
            } else{
                $nombre_estudio = $tmp_nombre_estudio;
            }

            if (($tmp_anno_estreno < 1960 || $tmp_anno_estreno > (date("Y") + 5))) {
                $err_anno_estreno = "Año de estreno no válido";
            } else{
                $anno_estreno = $tmp_anno_estreno;
            }

            if($tmp_num_temporadas == ""){
                $err_num_temporadas = "Numero de temporadas obligatorio";
            } else{ 
                if ($tmp_num_temporadas < 1 || $tmp_num_temporadas > 99) {
                    $err_num_temporadas = "Número de temporadas no válido";
                } else{
                    $num_temporadas = $tmp_num_temporadas;
                }
            }
            /*
            $sql = "INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas, imagen)
                    VALUES ('$titulo','$nombre_estudio', $anno_estreno, $num_temporadas, '$ubicacion_final')";
            $_conexion -> query($sql);
            */

            //1. Preparacion
            $sql = $_conexion -> prepare("INSERT INTO animes
                (titulo, nombre_estudio, anno_estreno, num_temporadas, imagen)
                VALUES (?,?,?,?,?)");

            // 2. Enlazado
            $sql -> bind_param("ssiis",
                $titulo,
                $nombre_estudio,
                $anno_estreno,
                $num_temporadas,
                $ubicacion_final
            );

            // 3. Ejecucion
            $sql -> execute();
        }

        $sql = "SELECT * FROM estudios ORDER BY nombre_estudio";
        $resultado = $_conexion -> query($sql);
        $estudios = [];

        while ($fila = $resultado -> fetch_assoc()){
            array_push($estudios, $fila["nombre_estudio"]);
        }
            
    ?>

    <div class="container">
        <h1>Nuevo Anime</h1> 
        <form class="col-4" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Titulo</label>
                <input type="text" class="form-control" name="titulo">
                <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre estudio</label> <br>
                <?php 
                    if(isset($err_nombre_estudio)) echo "<span class='error'>$err_nombre_estudio</span>";                     
                ?>
                <select name="nombre_estudio" class="form-select">
                    <option value ="" selected disabled hidden>--- Elige el estudio ---</option>
                <?php
                    foreach($estudios as $estudio){ ?>
                        <option value="<?php echo $estudio ?>">
                            <?php echo $estudio ?>
                        </option>
                    <?php } ?>
                </select> 
            </div>
            <div class="mb-3">
                <label class="form-label">Año de estreno</label>
                <input type="text" class="form-control" name="anno_estreno">
                <?php if(isset($err_anno_estreno)) echo "<span class='error'>$err_anno_estreno</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Numero de temporadas</label>
                <input type="text" class="form-control" name="num_temporadas">
                <?php if(isset($err_num_temporadas)) echo "<span class='error'>$err_num_temporadas</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen">
                <?php if(isset($err_imagen)) echo "<span class='error'>$err_imagen</span>"; ?>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Insertar">
                <a class="btn btn-secondary" href="index.php">Volver</a><br><br>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>