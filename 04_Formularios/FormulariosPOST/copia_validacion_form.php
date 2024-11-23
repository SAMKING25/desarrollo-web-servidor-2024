<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
    <div class="container">
    <!-- Content here -->
    <?php
        function calcularLetraDNI($dni) {
            $letras = "TRWAGMYFPDXBNJZSQVHLCKE"; 
            $numero = intval(substr($dni, 0, -1));
            $indice = $numero % 23; 
            return $letras[$indice];
        }

        function formatearNombre($nombre) { 
            return ucwords(strtolower($nombre)); 
        }
        function depurar(string $entrada) : string{
            $salida= htmlspecialchars($entrada);
            $salida = trim($salida);
            $salida = stripslashes($salida);
            $salida = preg_replace('!\s+', ' ', $salida);
            return $salida;
        }
    ?>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_usuario = $_POST["usuario"];
            $tmp_nombre =$_POST["nombre"];
            $tmp_apellidos= $_POST["apellidos"];
            $tmp_apellidos2= $_POST["apellidos2"];
            $tmp_dni = $_POST["dni"];
            $tmp_fecha = $_POST["fecha"];
            $tmp_correo = $_POST["correo"];

            if($tmp_usuario ==''){
                $err_usuario="El usuario es obligatorio";
            }else{
                //letras de la a A a la Z (mayus o munis) números y barrabaja
                $patron = "/^[a-zA-Z0-9_]{4,12}$/";
                if(!preg_match($patron,$tmp_usuario)){
                    $err_usuario="El usuario debe contener de 4 a 12 letras,
                    números o barrabaja";
                }else{
                    $usuario=$tmp_usuario;
                }
            }

            if($tmp_nombre == ''){
                $err_nombre = "El nombre es obligatorio";
            }else{
                if(strlen($tmp_nombre) <2 || strlen($tmp_nombre) > 40){
                    $err_nombre="El nombre debe tener entre 2 y 40 caracteres";
                }else{
                    //letras, espacios en blanco y tildes
                    $patron= "/^[a-zA-Z áéíóúÁÉÍÓÚñÑÜü]+$/";
                    if(!preg_match($patron, $tmp_nombre)){
                        $err_nombre = "El nombre solo puede contener letras y espacios 
                        en blanco";
                    }else{
                        $nombre = formatearNombre($tmp_nombre);
                    }
                }
            }


            if($tmp_apellidos == ''){
                $err_apellidos = "El apellido es obligatorio";
            }else{
                if(strlen($tmp_apellidos) <2 || strlen($tmp_apellidos) > 60){
                    $err_apellidos="El apellido debe tener entre 2 y 40 caracteres";
                }else{
                    //letras, espacios en blanco y tildes
                    $patron= "/^[a-zA-Z áéíóúÁÉÍÓÚñÑÜü]+$/";
                    if(!preg_match($patron, $tmp_apellidos)){
                        $err_apellidos = "El apellido solo puede contener letras y espacios 
                        en blanco";
                    }else{
                        $apellidos = formatearNombre($tmp_apellidos);
                    }
                }
            }

            if($tmp_apellidos2 == ''){
                $err_apellidos2 = "El apellido es obligatorio";
            }else{
                if(strlen($tmp_apellidos2) <2 || strlen($tmp_apellidos2) > 60){
                    $err_apellidos="El apellido debe tener entre 2 y 40 caracteres";
                }else{
                    //letras, espacios en blanco y tildes
                    $patron= "/^[a-zA-Z áéíóúÁÉÍÓÚñÑÜü]+$/";
                    if(!preg_match($patron, $tmp_apellidos2)){
                        $err_apellidos2 = "El apellido solo puede contener letras y espacios 
                        en blanco";
                    }else{
                        $apellidos2 = formatearNombre($tmp_apellidos2);
                    }
                }
            }

            if($tmp_dni == '') {
                $err_dni = "El DNI es obligatorio";
            } else {
                $tmp_dni = strtoupper($tmp_dni);
                $patron = "/^[0-9]{8}[A-Za-z]$/";
                if(!preg_match($patron, $tmp_dni)) {
                    $err_dni = "El DNI solo puede contener 8 números y una letra";
                } else {
                    //$numero_dni = substr($tmp_dni, 0, -1);
                    //$letra_dni = strtoupper(substr($tmp_dni, -1));
                    //$letra_correcta = calcularLetraDNI($tmp_dni);
                   // $letra_dni=substr($tmp_dni,8,1);
                    $letras = "TRWAGMYFPDXBNJZSQVHLCKE"; 
                    $numero = substr($tmp_dni, 0, 8);
                    $letra_dni= substr($tmp_dni,-1);
                    $indice=$numero % 23; 
                    $letra_correcta = $letras[$indice];
                    if ($letra_dni !== $letra_correcta) {
                        $err_dni = "La letra del DNI no es correcta. La letra correcta es $letra_correcta.";
                    } else {
                        $dni = $tmp_dni;
                    }
                }
            }


           /*  $fecha_de_hoy= date('Y m d');// obtengo el formato año mes dia
            $fecha_array=explode(' ',$fecha_de_hoy);
            echo "<p>$fecha_de_hoy</p>"; */

            if ($tmp_fecha == '') {
                $err_fecha = "La fecha es obligatoria";
            } else {
                if (strlen($tmp_fecha) != 10) {
                    $err_fecha = "La fecha solo puede tener el formato dd/mm/yyyy";
                } else {
                    $patron = "/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/";
                    if (!preg_match($patron, $tmp_fecha)) {
                        $err_fecha = "La fecha solo puede tener días = 2 números y no mayor a 31, mes = 2 números y no mayor a 12, año = 4 números";
                    } else {
                        $fecha_de_hoy = date('Y m d'); // obtengo el formato año mes dia
                        $fecha_array = explode(' ', $fecha_de_hoy);//explode es como el split
                        $tmp_fecha = explode('-', $tmp_fecha);
                        if (($fecha_array[0] - $tmp_fecha[0]) > 18) {
                            echo "<p>Eres mayor de edad</p>";
                        } elseif (($fecha_array[0] - $tmp_fecha[0]) == 18) {
                            if ($fecha_array[1] > $tmp_fecha[1]) {
                                echo "<p>Eres mayor de edad</p>";
                            } elseif ($fecha_array[1] == $tmp_fecha[1]) {
                                if ($fecha_array[2] >= $tmp_fecha[2]) {
                                    echo "<p>Eres mayor de edad</p>";
                                } else {
                                    echo "<p>No eres mayor de edad</p>";
                                }
                            } else {
                                echo "<p>No eres mayor de edad</p>";
                            }
                        } else {
                            echo "<p>No eres mayor de edad</p>";
                        }
                    }
                }
            }
            
            /* if ($tmp_fecha == '') {
                $err_fecha = "La fecha es obligatoria";
            } else {
                /* if (strlen($tmp_fecha) != 10) {
                    $err_fecha = "La fecha solo puede tener el formato dd/mm/yyyy";
                } else { */
                    /* $patron = "/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/";
                    if (!preg_match($patron, $tmp_fecha)) {
                        $err_fecha = "La fecha solo puede tener días = 2 números y no mayor a 31, mes = 2 números y no mayor a 12, año = 4 números";
                    } else { */
                        // convierto la fecha de nacimiento a un objeto datatime
                        /* $fecha = DateTime::createFromFormat('d/m/Y', $tmp_fecha);
                        $fecha_actual = new DateTime();
            
                        // calculo la edad
                        $edad = $fecha_actual->diff($fecha)->y;
                        $comprobar_fecha=explode("-",$tmp_fecha);
                        $edad=$comprobar_fecha[0];
                        if( $fecha_array[0] - $edad[0] >=18){
                            echo "<p>Eres mayor de edad</p>";
                        }
            
                        // compruebo si la persona es menor de 18 años 
                        if ($edad < 18) {
                            $err_fecha = "Debes ser mayor de 18 años.";
                        } else {
                            // la fecha es valida y la persona es mayor de 18 años
                            $fecha = $tmp_fecha;
                        }
                    }
                }
            } */

            if ($tmp_correo == '') {
                $err_correo = "El correo es obligatorio";
            } else {
                if (strlen($tmp_correo) < 3 || strlen($tmp_correo) > 254) {
                    $err_correo = "El correo debe tener entre 3 y 254 caracteres";
                } else {
                    $patron = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
                    if (!preg_match($patron, $tmp_correo)) {
                        $err_correo = "El correo puede tener letras, números, puntos, guiones bajos, porcentajes, más o menos, @";
                    } else {
                        $palabras_malsonantes = ['gay', 'maricon', 'puta'];
                        //compruebo que el correo contiene alguna palabra malsonante
                        foreach ($palabras_malsonantes as $palabra) {
                            if (str_contains($tmp_correo, $palabra)) {
                                $err_correo = "El correo no puede contener palabras malsonantes.";
                                break; //si se encuentra una palabra malsonante salgo del bucle
                            }
                        }
                        if (!isset($err_correo)) {
                            $correo = $tmp_correo;
                        }
                    }
                }
            }

            
        }
    ?>
    <h1>Formulario Usuario</h1>

    <form class="col-4" action="" method="post">
        <div class="mb-3">
            <label class="form-label">Usuario</label>
            <input type="text" class="form-control" name="usuario">
            <?php if(isset($err_usuario)) echo "<span class='error'>$err_usuario</span>" ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre">
            <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>

        </div>
        <div class="mb-3">
            <label class="form-label">Primer Apellido</label>
            <input type="text" class="form-control" name="apellidos">
            <?php if(isset($err_apellidos)) echo "<span class='error'>$err_apellidos</span>" ?>

        </div>
        <div class="mb-3">
            <label class="form-label">Segundo Apellido</label>
            <input type="text" class="form-control" name="apellidos2">
            <?php if(isset($err_apellidos2)) echo "<span class='error'>$err_apellidos2</span>" ?>

        </div>
        <div class="mb-3">
            <label class="form-label">DNI</label>
            <input type="text" class="form-control" name="dni">
            <?php if(isset($err_dni)) echo "<span class='error'>$err_dni</span>" ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" name="fecha">
            <?php if(isset($err_fecha)) echo "<span class='error'>$err_fecha</span>" ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Correo Electronico</label>
            <input type="text" class="form-control" name="correo">
            <?php if(isset($err_correo)) echo "<span class='error'>$err_correo</span>" ?>
        </div>
        <div>
        <input class="btn btn-primary" type="submit" value="Enviar">
        </div>
    </form>
        <?php
            if (isset($nombre) && isset($apellidos) && isset($apellidos2) && isset($dni) && isset($fecha) && isset($correo)) {
                echo "<h2>Datos del Usuario</h2>"; 
                echo "<p>Nombre: $nombre</p>"; 
                echo "<p>Primer Apellido: $apellidos</p>"; 
                echo "<p>Segundo Apellido: $apellidos2</p>"; 
                echo "<p>DNI: $dni</p>"; 
                echo "<p>Fecha de nacimiento: $fecha</p>"; 
                echo "<p>Correo Electrónico: $correo</p>"; 
            }
        ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>