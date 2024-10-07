<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link rel="stylesheet" href="estilos.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php
        $peliculas = [
            ["Karate a muerte en Torremolinos","Accion",1975],
            ["Sharknado 1-5","Accion",2015],
            ["Princesa por sorpresa 2","Comedia",2008],
            ["Temblores 4","Terror",2018],
            ["Cariño he encogido a los niños","Aventura",2001],
            ["Stuart Little","Infantil",2000],
        ]

        /**
         * 1. AÑADIR CON UN RAND LA DURACION DE LAS PELICULAS ,
         *    LA DURACION SERA UN NUMERO ALEATORIO ENSTRE 30 Y 240
         * 
         * 2.AÑADIR COMO UNA NUEVA COLUMNA EL TIPO DE PELICULA. EL TIPO SERA:
         *   - CORTOMETRAJE SI LA DURACION ES MENOR A 60
         *   - LARGOMETRAJE SI LA DURACION ES MAYOR O IGUAL A 60
         * 
         * 3. MOSTRAR EN OTRA TABLA TODAS LA SCOLUMNAS Y ORDENAR ADEMAS EN ESTE ORDEN:
         *    1. GENERO
         *    2. AÑO
         *    3. TITULO (ALFABETICAMENTE Y EL AÑO DE MAS RECIENTE A MAS ANTIGUO)
         *    
         */
    ?>


    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Genero</th>
                <th>Año</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($peliculas as $pelicula){
                    list($titulo, $genero, $anio) = $pelicula;
                    echo"<tr>";
                    echo"<td>$titulo</td>";
                    echo"<td>$genero</td>";
                    echo"<td>$anio</td>";
                    echo"</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>