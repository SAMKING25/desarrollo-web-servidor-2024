<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo IRPF</title>
</head>
<body>
    <!-- 
        Primer tramo hasta 12.450 euros en el que se paga un 19%.

        Segundo tramo hasta 20.199 euros con tipo del 24%

        Tercer tramo hasta 35.199 euros con un 30%.

        Cuarto tramo hasta 59.999 euros con un 37%

        Quinto tramo hasta 299.999 euros con un 45%

        Sexto tramo a partir de 300.000 euros de 47%.
    -->

    <h2>Calcular el IRPF</h2>
    <form action="" method="post">
        <label>Salario Bruto: </label>
        <input type="text" name="sal_bruto"><br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $sal_bruto = $_POST["sal_bruto"];
        $salario;

        if($sal_bruto < 12400){
            $salario = $sal_bruto*0.81;  
        } elseif($sal_bruto > 12400){
            
        }

    }
    ?>

</body>
</html>