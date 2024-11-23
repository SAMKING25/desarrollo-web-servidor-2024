<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRPF</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );  

        require('../../05_Funciones/economia.php');
    ?>

    <style>
        .error{
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_salario = $_POST["salario"];

        if($tmp_salario == '') {
            $err_salario = "El salario es obligatorio";
        } else {
            if(filter_var($tmp_salario, FILTER_VALIDATE_FLOAT) === FALSE) {
                $err_salario = "El salario debe ser un número";
            } else {
                if($tmp_salario < 0) {
                    $err_salario = "El salario debe ser mayor o igual que cero";
                } else {
                    $salario = $tmp_salario;
                }
            }
        }
    }
    ?>
    <form action="" method="post">
        <input type="text" name="salario" placeholder="Salario">
        <input type="submit" value="Calcular salario bruto">
    </form>

    <?php
        if(isset($salario)) {
            $salario_final = calcularIRPF($salario);
            echo "<h2>El salario neto de $salario es $salario_final</h2>";    
        }
    ?>
</body>
</html>