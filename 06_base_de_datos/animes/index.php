<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );  

        require('conexion.php');
    ?>
</head>
<body>
    <?php
        $sql = "SELECT * FROM animes";
        $resultado = $_conexion -> query($sql);

        /**
         * Aplicamos la funcion query a la conexion donde se ejecuta 
         * la sentencia SQL hecha
         * 
         * El resultado se almacena $resultado que es un objeto con una estructura
         * parecida a los arrays
         */
    ?>

    <div class="container">
        <h1>Tabla animes</h1>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Titulo</th>
                    <th>Estudio</th>
                    <th>Año</th>
                    <th>Numero de temporadas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado -> fetch_assoc()){  // trata el resultado como array asociativo
                        echo "<tr>";
                        echo "<td>" . $fila["titulo"] ."</td>";
                        echo "<td>" . $fila["nombre_estudio"] ."</td>";
                        echo "<td>" . $fila["anno_estreno"] ."</td>";
                        echo "<td>" . $fila["num_temporadas"] ."</td>";
                        echo "</tr>";

                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>