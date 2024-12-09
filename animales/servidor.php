<?php


include 'funcion_conexion_bd.php';
DEFINE("SERVIDOR", "localhost");
DEFINE("USER", "mariadb");
DEFINE("PASSWD", "mariadb");
DEFINE("BASE_DATOS", "mariadb");

$metodo = $_SERVER['REQUEST_METHOD'];
$recurso = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL);

switch ($metodo) {
    case 'GET':
        if (isset($_REQUEST['tipo'])) {
            $tipo = filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
            $tipo = strtoupper($tipo);
            $sql = "SELECT nombre, peso, edad from animales where tipo = '" . $tipo . "'";

            $con_bd = conexion_bd(SERVIDOR, USER, PASSWD,  BASE_DATOS, $sql);
            echo json_encode($con_bd, TRUE);
        } else {
            echo json_encode(["error" => "Debe proporcionar un tipo de animal"], TRUE);
        }

        break;


    case 'POST':

        echo "Datos recibidos: " . json_encode($_POST);

        if (isset($_REQUEST["nombre"]) && isset($_REQUEST["tipo"]) && isset($_REQUEST["peso"]) && isset($_REQUEST["edad"])) {

            $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
            $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
            $peso = filter_var(filter_input(INPUT_POST, 'peso', FILTER_DEFAULT), FILTER_VALIDATE_FLOAT);
            $edad = filter_var(filter_input(INPUT_POST, 'edad', FILTER_DEFAULT), FILTER_VALIDATE_INT);

            $sql = "INSERT INTO animales (nombre, tipo, peso, edad) VALUES ('" . $nombre . "','" . $tipo . "','" . $peso . "','" . $edad . "')";
            $con_bd = conexion_bd(SERVIDOR, USER, PASSWD,  BASE_DATOS, $sql);
            echo json_encode($con_bd, TRUE);
        } else {
            echo json_encode(["error" => "Todos los campos son obligatorios"], TRUE);
        }

        break;

    case 'DELETE':
        if (isset($_REQUEST['id'])) {
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $sql = "DELETE FROM animales WHERE id= '" . $id . "'";
            $con_bd = conexion_bd(SERVIDOR, USER, PASSWD,  BASE_DATOS, $sql);
            echo json_encode($con_bd, TRUE);
        } else {
            echo json_encode(["error" => "Debe proporcionar un ID"], TRUE);
        }
        break;
    case 'PUT':

        parse_str(file_get_contents("php://input"), $put_params);

        if (isset($put_params['id']) && isset($put_params["nombre"]) && isset($put_params["tipo"]) && isset($put_params["peso"]) && isset($put_params["edad"])) {


            $id = filter_var($put_params['id'], FILTER_VALIDATE_INT);
            if ($id === false) {
                $id = null; // Manejar un valor no válido
            }

            $nombre = filter_var($put_params['nombre'], FILTER_SANITIZE_SPECIAL_CHARS);
            $tipo = filter_var($put_params['tipo'], FILTER_SANITIZE_SPECIAL_CHARS);

            $peso = filter_var($put_params['peso'], FILTER_VALIDATE_FLOAT);
            if ($peso === false) {
                $peso = null; // Manejar un valor no válido
            }

            $edad = filter_var($put_params['edad'], FILTER_VALIDATE_INT);
            if ($edad === false) {
                $edad = null; // Manejar un valor no válido
            }

            $sql = "UPDATE animales SET nombre = '" . $nombre . "', tipo = '" . $tipo . "', edad = '" . $edad . "',peso = '" . $peso . "' WHERE id = '" . $id . "'";
            $con_bd = conexion_bd(SERVIDOR, USER, PASSWD,  BASE_DATOS, $sql);
            echo json_encode($con_bd, TRUE);
        } else {
            echo json_encode(["error" => "Todos los campos son obligatorios"], TRUE);
        }
        break;

    default:
        //$respuesta ="Opción incorrecta!!!!";
        http_response_code(400); // Código de estado 400: solicitud incorrecta
        echo json_encode(["error" => "Método HTTP no válido"]);
        break;
}
