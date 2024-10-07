<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrices</title>
    <link rel="stylesheet" href="estilos.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php
        $videojuegos = [
            ["Disco Elysium","RPG",24.99],
            ["Dragon Ball Z Kakarot","Accion",59.99],
            ["Persona 3", "RPG",24.99],
            ["Commando 2","Estrategia",4.99],
            ["Hollow Night","Metroidvania",9.99],
            ["Stardew Valley","Gestion de recursos",7.99]
        ];

        $nuevo_videojuego = ["Octopath traveler","RPG",24.99];
        array_push($videojuegos,$nuevo_videojuego);

        array_push($videojuegos,["Ender Lilies","Metroidvania",9.95]);

        array_push($videojuegos,["Dota 2","MOBA",0]);
        array_push($videojuegos,["Fall Guys","Plataformas",0]);
        array_push($videojuegos,["Rocket League","Deporte",0]);
        array_push($videojuegos,["Lego Fortnite","Accion",0]);

        for($i = 0;$i < count($videojuegos); $i++){
            if($videojuegos[$i][2] > 0){
                $videojuegos[$i][3] = "PAGO";
            } else{
                $videojuegos[$i][3] = "GRATIS";
            }
        }



        /* unset($videojuegos[3]);
        $videojuegos = array_values($videojuegos); */

        // print_r($videojuegos);

        $_titulo = array_column($videojuegos, 0);
        //  Si fuera descendentes SORT_DESC
        array_multisort($_titulo, SORT_ASC,$videojuegos);

        $_titulo = array_column($videojuegos, 0);
        $_categoria = array_column($videojuegos, 1);
        $_precio = array_column($videojuegos, 2);
        array_multisort($_categoria, SORT_ASC,
                        $_precio,SORT_DESC,
                        $_titulo,SORT_DESC,
                        $videojuegos);
    ?>
<table>
        <thead>
            <tr>
                <th>Videojuegos</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($videojuegos as $videojuego){
                    //echo $videojuego[0]; para mostrar alguna columna
                    
                    list($titulo, $categoria, $precio,$valor) = $videojuego; ?>
                    <tr>
                        <td><?php echo $titulo ?></td>
                        <td><?php echo $categoria ?></td>
                        <td><?php echo $precio ?></td> 
                        <td><?php echo $valor ?></td>
                    </tr>
                <?php }  ?>
           
        </tbody>
    </table>
</body>
</html>