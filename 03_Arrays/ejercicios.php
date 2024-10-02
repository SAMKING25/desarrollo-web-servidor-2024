<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
    <link rel="stylesheet" href="estilos.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <!-- RECORDATORIO!!! EL VIERNES VEMOS COMO ORDENAR TABLAS-->

    <!-- EJERCICIO 1
        Desarrollo web en oentorno servidor => Alejandra
        Desarrollo web en entorno cliente => Jose Miguel
        Diseño de interfaces web => Jose Miguel
        Despliegue de aplicaiones => Jaime
        Empresa e Iniciativa emprendedora => Andrea
        Ingles => Virgina
        
        MOSTRARLO TODO EN TABLA
    -->
    <?php
        $asignaturas = [
            "Desarrollo web en entorno servidor" => "Alejandra",
            "Desarrollo web en entorno cliente" => "Jose Miguel",
            "Diseño de interfaces web" => "Jose Miguel",
            "Despliegue de aplicaiones" => "Jaime",
            "Empresa e Iniciativa emprendedora" => "Andrea",
            "Ingles" => "Virgina"
        ];
    ?>

    <table>
        <caption>ASIGNATURAS</caption>
        <thead>
            <tr>
                <th>Clase</th>
                <th>Profesor</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($asignaturas as $asignatura => $profesor){
                    echo "<tr>";
                        echo "<td>$asignatura</td>";
                        echo "<td>$profesor</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <!-- EJERCICIO 2
        Francisco => 3
        Daniel => 5
        Aurora => 10
        Samuel => 9
        Luis => 7
        
        MOSTRARLO TODO EN TABLA CON 3 COLUMNAS:
        - COLUMNA 1: ALUMNO
        - COLUMNA 2: NOTA
        - COLUMNA 3: SI NOTA < 5,SUSPENSO,ELSE APROBADO
    -->
    <?php
        $notas = [
            "Francisco" => 3,
            "Daniel" => 5,
            "Aurora" => 10,
            "Samuel" => 2,
            "Luis" => 7
        ];
    ?>

    <table>
        <caption>NOTAS</caption>
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Nota</th>
                <th>Calificacion</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($notas as $nombre => $nota){?>
                    <tr>
                    <td><?php echo $nombre ?></td>
                    <td><?php echo $nota ?></td>
                        <?php if($nota < 5){ ?>
                            <td class="suspenso">SUSPENSO</td>
                        <?php } elseif ($nota >= 5 && $nota < 7 ) { ?>
                            <td class="bien">BIEN</td>
                        <?php } elseif ($nota >= 7 && $nota < 9 ) { ?>
                            <td class="notable">NOTABLE</td>
                        <?php } else { ?>
                            <td class="sobresaliente">SOBRESALIENTE</td>
                        <?php } 

                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
