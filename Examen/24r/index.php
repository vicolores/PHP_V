<?php

/**
 * Servidor REST: My Name Is Earl
 * Se encarga de recibir las peticiones HTTP (GET, POST, PUT, DELETE)
 * y responder con datos en formato JSON.
 */

include 'funcion_conexion_bd.php';
include 'config.php';

$metodo = $_SERVER['REQUEST_METHOD'];

// Este condicional evita mostrar datos al iniciar, según la ruta base.
if (strcmp($_SERVER["REQUEST_URI"], "/toni/exam_2t_Serv_Web/") !== 0) {
    switch ($metodo) {
        case 'GET':
            // Si recibe un "id", busca el registro específico;
            // de lo contrario, obtiene todos.
            if (isset($_REQUEST['id'])) {
                $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                $sql = "SELECT * FROM offenselist WHERE id = '" . $id . "'";
            } else {
                $sql = "SELECT * FROM offenselist";
            }
            $con_bd = conexion_bd(SERVIDOR, USER, PASSWD, BASE_DATOS, $sql);
            echo json_encode($con_bd, true);
            break;

        case 'PUT':
            // Leer parámetros enviados en PUT (similar a POST pero se accede vía php://input)
            parse_str(file_get_contents("php://input"), $put_params);
            $id = $put_params['id'];
            $nom_ofendido = $put_params['nom_ofendido'];

            $sql = "UPDATE offenselist SET nom_ofendido = '" . $nom_ofendido . "' WHERE id = '" . $id . "'";
            $con_bd = conexion_bd(SERVIDOR, USER, PASSWD, BASE_DATOS, $sql);
            echo json_encode($con_bd, true);
            break;

        case 'DELETE':
            if (isset($_REQUEST['id'])) {
                $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                $sql = "DELETE FROM offenselist WHERE id = '" . $id . "'";
                $con_bd = conexion_bd(SERVIDOR, USER, PASSWD, BASE_DATOS, $sql);
                echo json_encode($con_bd, true);
            }
            break;

        case 'POST':
            $nom_ofendido = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
            $dir_ofendido = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
            $ofensa = filter_input(INPUT_POST, 'ofensa', FILTER_SANITIZE_STRING);

            $sql = "INSERT INTO offenselist (nom_ofendido, ofensa, dir_ofendido) 
                    VALUES ('" . $nom_ofendido . "', '" . $ofensa . "', '" . $dir_ofendido . "')";
            $con_bd = conexion_bd(SERVIDOR, USER, PASSWD, BASE_DATOS, $sql);
            echo json_encode($con_bd, true);
            break;

        default:
            echo "Opción incorrecta!!!!";
    }
} else {
    // Mensaje por defecto al acceder a la ruta principal
    echo "<h3>Servidor REST My Name Is Earl</h3>";
}
