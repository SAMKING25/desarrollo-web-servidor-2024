<?php
    header("Content-Type: application/json");
    include("conexion_pdo.php");

    $metodo = $_SERVER["REQUEST_METHOD"];

    switch($metodo) {
        case "GET":
            // echo json_encode(["mensaje" => "get"]);
            manejarGet($_conexion);
            break;
        case "POST":
            echo json_encode(["mensaje" => "post"]);
            break;
        case "PUT":
            echo json_encode(["mensaje" => "put"]);
            break;
        case "DELETE":
            echo json_encode(["mensaje" => "delete"]);
            break;
        default:
        echo json_encode(["mensaje" => "otro"]);
            break;
    }

    function manejarGet($_conexion){
        $sql = "SELECT * FROM estudios";
        $stmt = $_conexion -> prepare ($sql);
        $stmt -> execute();
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC); #equivalente al get_result de mysqli
        echo json_encode($resultado);
    }
?>