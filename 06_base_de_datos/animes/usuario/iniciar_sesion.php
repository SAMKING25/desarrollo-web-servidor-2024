<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 ); 
        require('../conexion.php'); 

    ?>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <?php 
        function depurar(string $entrada) : string{
            $salida = htmlspecialchars($entrada);
            $salida = trim($salida);
            $salida = preg_replace('!\s+!',' ',$salida);
            return $salida;
        }
    ?>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $usuario = $_POST["usuario"];
            $contrasena = $_POST["contrasena"];

            /* $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $resultado = $_conexion -> query($sql); */

            // 1
            $sql = $_conexion -> prepare("SELECT * FROM usuarios WHERE usuario = ?");
            
            // 2
            $sql -> bind_param("s",$usuario);

            // 3
            $sql -> execute();
            $resultado = $sql -> get_result();

            if($resultado -> num_rows == 0){
                $err_usuario = "El usuario $usuario no existe";
            } else {
                $dato_usuario = $resultado -> fetch_assoc();
                /**
                 * Podemos acceder a:
                 * 
                 * $datos_usuario["usuario"]
                 * $datos_usuario["contrasena"]
                 * */
                $acceso_concedido = password_verify($contrasena,$dato_usuario["contrasena"]);
                if(!$acceso_concedido){
                    $err_contrasena = "Contraseña incorrecta";
                } else {
                    // LOGIN CORRECTO
                    session_start();
                    $_SESSION["usuario"] = $usuario; // se guarda en el servidor
                    // $_COOKIE["loquesea"] = "loquesea"; se guarda en el clinete
                    header("location: ../index.php");
                    exit;
                }
            }
        }
    ?>

    <div class="container">
        <h1>Iniciar sesión</h1> 
        <form class="col-5" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario">
                <?php if(isset($err_usuario)) echo "<span class='error'>$err_usuario</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="contrasena">
                <?php if(isset($err_contrasena)) echo "<span class='error'>$err_contrasena</span>"; ?>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Iniciar sesión">
            </div>
            <div class="mb-3">
                <p>Si aun no tienes cuenta, regístrate</p>
                <a class="btn btn-secondary" href="registro.php">Registrarse</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>