<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importante_P2</title>
    
    <!-- LINK CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        //NOTIFICAR ERRORES
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

        //IMPORTAR FUNCIONES
        require("../05_funciones/depurar.php");
    ?>
</head>
<body>
    <!-- Contenedor BOOTSTRAP -->
    <div class="container">
        <?php
            // string en parametros para obligar a que entre un String
            // : string para devolver un string 100%
            function depurar(string $entrada) : string {
                // Para que el usuario no pueda usar etiquetas en los campos Ej: <h1>Hola</h1>
                $salida = htmlspecialchars($entrada);
                // Para quitar los espacios de delante y detrás
                $salida = trim($salida);
                // Quita posibles bugs muy raros como que el usuario introduzca: \n (No está de más ponerla)
                $salida = stripslashes($salida);
                // Para quitar los múltiples espacios entre variables y demás
                $salida = preg_replace('!\s+!', ' ', $salida);
                return $salida;
            }
            
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                // Definimos las variables con el depurar
                $tmp_usuario = depurar($_POST["usuario"]);

                // Se pueden comparar strings como si fueran números (nos quita mucho trabajo);
                if ($tmp_fecha_nacimiento > $tmp_fecha_primer_dni) {
                    echo "<h1>La fecha de nacimiento no puede ser posterior a la del DNI</h1>";
                } else if ($tmp_fecha_nacimiento == $tmp_fecha_primer_dni) {
                    echo "<h1>La fecha de nacimiento es igual a la del DNI</h1>";
                } else {
                    echo "<h1>Ok, la fecha está bien</h1>";
                }

                // Forma de optimizar la validación de fechas
                $min_date = '1947-01-01'; 
                $max_date = date('Y-m-d', strtotime('+5 years')); 

                // filter_var($variable, validacion) Te valida si un tipo de dato es el correcto
                if (filter_var($tmp_salario, FILTER_VALIDATE_INT) === FALSE) echo "<p>El salario debe ser un número</p>";
                if (filter_var($tmp_email, FILTER_VALIDATE_EMAIL) === FALSE) echo "";
                if (filter_var($tmp_temperatura, FILTER_VALIDATE_FLOAT) === FALSE) echo "";

                // Lo paso a mayúscula para comprobarlo una vez sea mayúscula
                $tmp_dni = strtoupper($tmp_dni);
                
                // $patron tiene que ir entre /^ $/
                //Patrón para DNI
                $patron = "/^[0-9]{8}[A-Z]$/";
                //Patrón para usuario
                $patron = "/^[a-zA-Z0-9_]{4,12}$/";
                //Patrón para nombre o apellido
                $patron = "/^[a-zA-Z áéióúÁÉÍÓÚñÑüÜ]+$/";
                //Patrón para fecha
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";

                // Para comprobar que sigue el patron
                if (!preg_match($patron, $tmp_dni)) $err_dni = "El DNI debe tener 8 dígitos y una letra";

                $palabras_baneadas = ["caca", "peo", "caracoles"];
                $palabras_encontradas = "";
                foreach($palabras_baneadas as $palabras_baneada) {
                    // Para ver si el string contiene el segundo parámetro
                    if (str_contains($tmp_correo, $palabras_baneada)) {
                        $palabras_encontradas = "$palabra_baneada, " . $palabras_encontradas;
                    }
                }

                //Comprobar longitud de cadenas
                if (strlen($tmp_nombre) < 2 or strlen($tmp_nombre) > 40) $err_nombre = "El nombre debe tener entre 2 y 40 caracteres";

                //strtolower: ponemos la variable en minúscula, y una vez minúscula...
                //ucwords: pone la primera letra en mayúscula
                $nombre = ucwords(strtolower($tmp_nombre));

                //Fecha actual en formato Año-Mes-Día
                $fecha_actual = date("Y-m-d");

                // Asigna variables a los 3 campos del explode (explode == split)
                list($anno_actual,$mes_actual,$dia_actual) = explode('-',$fecha_actual);
            }
        ?>

        <!-- FORMULARIO -->
        <form class="col-4" action="" method="post">
            <div class="mb-3">
                <label class="form-label">DNI</label>
                <input class="form-control" type="text" name="dni">

                <!-- isset(variable) Comprueba que la variable esté definida (no sea null) -->
                <?php if(isset($err_dni)) echo "<span class='error'>$err_dni</span>" ?>
            </div>
        </form>
        <!-- CORRECCIÓN FINAL -->
        <?php
        // Si todas las variables están definidas y no son null, las muestra
        if (isset($dni) && isset($correo) && isset($usuario) && isset($nombre) && isset($fecha_nacimiento)) { ?>
            <p><?php echo $dni ?></p>
            <p><?php echo $correo ?></p>
            <p><?php echo $usuario ?></p>
            <p><?php echo $nombre ?></p>
            <p><?php echo $apellidos ?></p>
            <p><?php echo $fecha_nacimiento ?></p>
        <?php } ?>
    </div>
    <!-- SCRIPT BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html> 