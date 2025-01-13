<!DOCTYPE html>
<html lang="en">
r<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo anime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );    

        require('conexion.php');

        session_start();
        if(isset($_SESSION["usuario"])){
            echo "<h2>Bienvenid@ ".$_SESSION["usuario"]." </h2>";
        } else {
            header("location: usuario/iniciar_sesion.php");
            exit;
        }
    ?>
</head>
<body>
    <div class="container">
        <h1>Editar anime</h1>
        <?php
        $id_anime = $_GET["id_anime"];
        /* $sql = "SELECT * FROM animes WHERE id_anime = $id_anime";
        $resultado = $_conexion -> query($sql); */

        // 1. Prepare
        $sql = $_conexion -> prepare("SELECT * FROM animes WHERE id_anime = ?");
        // 2. Binding
        $sql -> bind_param("i",$id_anime);
        // 3. Execute
        $sql -> execute();
        // 4. Retrieve
        $resultado = $sql -> get_result();

        while($fila = $resultado -> fetch_assoc()) {
            $titulo = $fila["titulo"];
            $nombre_estudio = $fila["nombre_estudio"];
            $anno_estreno = $fila["anno_estreno"];
            $num_temporadas = $fila["num_temporadas"];
            $imagen = $fila["imagen"];
        }

        /* $sql = "SELECT * FROM estudios ORDER BY nombre_estudio";
        $resultado = $_conexion -> query($sql); */

        // 1. Prepare
        $sql = $_conexion -> prepare("SELECT * FROM estudios ORDER BY ?");
        // 2. Bind
        $sql -> bind_param("s",$nombre_estudio);
        // 3. Execute
        $sql -> execute();
        // 4. Retrieve
        $resultado = $sql -> get_result();

        $estudios = [];

        while($fila = $resultado -> fetch_assoc()) {
            array_push($estudios, $fila["nombre_estudio"]);
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id_anime = $_POST["id_anime"];
            $titulo = $_POST["titulo"];
            $nombre_estudio = $_POST["nombre_estudio"];
            $anno_estreno = $_POST["anno_estreno"];
            $num_temporadas = $_POST["num_temporadas"];

            /* $sql = "UPDATE animes SET
                    titulo = '$titulo',
                    nombre_estudio = '$nombre_estudio',
                    anno_estreno = $anno_estreno,
                    num_temporadas = $num_temporadas
                    WHERE id_anime = $id_anime
                    ";
            $_conexion -> query($sql); */

            // 1. Prepare
            $sql = $_conexion -> prepare($sql = "UPDATE animes SET
                titulo = ?,
                nombre_estudio = ?,
                anno_estreno = ?,
                num_temporadas = ?
                WHERE id_anime = ?
            ");

            // 2. Binding
            $sql -> bind_param("ssiii",
                $titulo,
                $nombre_estudio,
                $anno_estreno,
                $num_temporadas,
                $id_anime
            );

            // 3. Ejecucion
            $sql -> execute();
        }
        ?>
        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" type="text" name="titulo" value="<?php echo $titulo ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre estudio</label>
                <select class="form-select" name="nombre_estudio">
                    <option value="<?php echo $nombre_estudio ?>" selected hidden><?php echo $nombre_estudio ?></option>
                    <?php
                    foreach($estudios as $estudio) { ?>
                        <option value="<?php echo $estudio ?>">
                            <?php echo $estudio ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Año estreno</label>
                <input class="form-control" type="text" name="anno_estreno" value="<?php echo $anno_estreno ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Número de temporadas</label>
                <input class="form-control" type="text" name="num_temporadas" value="<?php echo $num_temporadas ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" type="file" name="imagen">
            </div>
            <div class="mb-3">
            <input type="hidden" name="id_anime" value="<?php echo $id_anime ?>">
                <input class="btn btn-primary" type="submit" value="Confirmar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>