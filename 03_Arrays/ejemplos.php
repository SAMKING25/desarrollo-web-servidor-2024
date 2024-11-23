<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
    <link rel="stylesheet" href="estilos.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php
    /**
     * TODOS LOS ARRAYS EN PHP SON ASOCIATIVOS COMO LOS MAPS DE JAVA
     * 
     * TIENEN PARES CLAVE-VALOR
     */

    $numeros = [5,10,9,6,7,4];
    $numeros = array(6,10,9,4,3);
    print_r($numeros); #    PRINT RELATIONAL

    echo "<br><br>";

    /* $animales = ["Perro","Gato","Ornitorrinco","Suricato","Capibara"];
    $animales = [
        "A01" => "Perro",
        "A02" => "Gato",
        "A03" => "Ornitorrinco",
        "A04" => "Suricato",
        "A05" => "Capibara"
    ];
    echo "<p>". $animales["A03"]."</p>";
    print_r($animales); */

    $animales = array(
        "Perro",
        "Gato",
        "Ornitorrinco",
        "Suricato",
        "Capibara"
    );

    $animales[2] = "Koala";
    $animales[6] = "Iguana";
    $animales["A01"] = "Elefante";
    array_push($animales,"Morsa","Foca");
    $animales[] = "Ganso";
    unset($animales[1]);

    $animales = array_values($animales);

    echo "<h3> Mostrar la array con For </h3>";
    echo"<ol>";
    for($i=0;$i <count($animales);$i++){
        echo "<li>".$animales[$i]."</li>";
    }
    echo "</ol>";

    echo "<h3> Mostrar la array con While </h3>";
    echo"<ol>";
    $i = 0;
    while($i < count($animales)){
        echo "<li>".$animales[$i]."</li>";
        $i++;
    }
    echo "</ol>";
    $cantidad_animales = count($animales);
    
    echo "<h3>Hay $cantidad_animales animales</h3>";

    /**
     * CREAR UN ARRAY CON 3 COCHES
     * AÑADE 2 COCHES CON MATRICULA
     * AÑADE UN COCHE SIN MATRICULA
     * BORRA EL CONCHE SIN MATRICULA
     * RESETEAR CLAVES Y AMACENAR EL RESULTADO DE OTRO ARRAY
     */

     $coches = [
        "2324 TMD" => "Audi TT",
        "8977 CWD" => "Volskwagen Polo",
        "1178 KFC" => "Mercedes CLR"
    ];

    $coches["3523 QHD"]= "Mitsubishi Colt";
    $coches["7899 CVV"]= "Zentorno";
    $coches[]= "T20";

    unset($coches[0]);
    $coches_2 = array_values($coches);

    // print_r($coches_2);
    echo "<h3>Listas con ForEach</h3>";
    echo "<ol>";
    foreach($coches as $coche){
        echo "<li>$coche</li>";
    }
    echo "</ol>";
    
    echo "<h3>Listas con ForEach y CLAVE</h3>";
    echo "<ol>";
    foreach($coches as $matricula => $coche){
        echo "<li>$matricula , $coche</li>";
    }
    echo "</ol>";    
    ?>

    <table>
        <caption>Coches</caption>
        <thead>
            <tr>
                <th>Matricula</th>
                <th>Coche</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($coches as $matricula => $coche){
                    echo "<tr>";
                        echo "<td>$matricula</td>";
                        echo "<td>$coche</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

</body>
</html>