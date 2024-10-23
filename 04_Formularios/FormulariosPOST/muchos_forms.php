<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muchos Formularios</title>

    <?php
        require('../../05_Funciones/potencias.php');
        require('../../05_Funciones/tablaMult.php');
    ?>
</head>
<body>
    <form action="" method="post">
        <label for="base">Base</label> 
        <input type="text" name="base" id="base" placeholder="Introduce la base..">
        <br><br>
        <label for="expo">Exponente</label> 
        <input type="text" name="exponente" id="expo" placeholder="Introduce el exponente..">
        <br><br>

        <input type="hidden" name="accion" value="formulario_potencias">
        
        <input type="submit" value="Calcular">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST["accion"] == "formulario_potencias"){
                $tmp_base = $_POST["base"];
                $tmp_expo = $_POST["exponente"];

                /* if($tmp_base != ''){
                    if(filter_var($tmp_base, FILTER_VALIDATE_INT) !== false){
                        $base = $tmp_base;
                    } else {
                        echo "<p>La base debe ser un numero</p>";
                    }
                } else {
                    echo "<p>La base es obligatorio</p>";
                } */

                if($tmp_base == ''){
                    echo "<p>La base es obligatorio</p>";
                } else {
                    if(filter_var($tmp_base, FILTER_VALIDATE_INT) !== false){
                        $base = $tmp_base;
                    } else {
                        echo "<p>La base debe ser un numero</p>";
                    }
                } 
                
                /* if($tmp_expo != ''){
                    if(filter_var($tmp_exponente, FILTER_VALIDATE_INT) !== false){
                        if($tmp_expo >= 0){
                            $exponente = $tmp_expo;
                        } else {
                            echo "<p> El exponente debe ser mayor o igual a cero</p>";
                        }
                    } else {
                        echo "<p>El exponente debe ser un numero</p>";
                    }
                } else {
                    echo "<p>El exponente es obligatorio</p>";
                } */

                if($tmp_expo == ''){
                    echo "<p>El exponente es obligatorio</p>";
                } else {
                    if(filter_var($tmp_expo, FILTER_VALIDATE_INT) === false){
                        echo "<p>El exponente debe ser un numero</p>";
                    } else {
                        if($tmp_expo < 0){
                            echo "<p> El exponente debe ser mayor o igual a cero</p>";
                        } else {
                            $exponente = $tmp_expo;
                        }
                    }
                }

                if(isset($base) && isset($exponente)){
                    $resultado = calcPotencia($base,$exponente);
                    echo "<p>El resultado es $resultado</p>";
                }
            }
        } 
    ?>

    <form action="" method="post">
        <label for="numero">Número</label>
        <input type="number" name="numero" id="numero">
        
        <input type="hidden" name="accion" value="formulario_tablaMult">
                
        <input type="submit" value="Calcular">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST["accion"] == "formulario_tablaMult"){
                $numero = (int)$_POST["numero"];

                tablaMult($numero);
            }
        }
    ?>
</body>
</html>