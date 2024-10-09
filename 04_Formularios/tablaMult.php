<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <!-- 
        CREAR NU FORMULARIO QUE RECIBA UN NUMERO

        SE MOSTRARA LA TABLA DE MULTIPLICAR DE ESE NUMERO E TABLA HTML

        2 x 1 = 2
    -->
    <form action="" method="post">
        <h1>Tabla de Multiplicacion</h1>
        <label for="num">Numero</label> 
        <input type="text" name="num" id="num" placeholder="Introduce un numero..">
        <br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $num = $_POST["num"]; 

    ?>
    <table>
        <thead>
            <tr>
                <th>Multiplicacion</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                for($i = 1; $i <11; $i++ ){
                        $res=$num*$i;
                        echo"<tr>";
                        echo"<td>$num x $i </td>";
                        echo"<td>$res</td>";
                        echo"</tr>";
                    }
                } 
            ?>
        </tbody>
    </table>
</body>
</html>