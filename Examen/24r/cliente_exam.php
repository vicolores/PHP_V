<?php
// Mover la lógica de redirección antes de que empiece la salida HTML:
if (isset($_REQUEST["validar2"])) {
    header("Location: mostrar_todo_exam.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cliente My Name Is Earl REST</title>
</head>

<body>
    <div id="main" style="position:absolute; left: 10%">
        <h3>My Name Is Earl</h3>
        <form name="ofensse" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <div style="border-style: solid; border-color: black; border-radius: 8px; padding: 10px; width: 300px;">
                <label>Id</label>
                <input type="text" aria-label="Id" name="id">

                <br><br>
                <input type="submit" name="eliminar" value="Eliminar">
                <input type="submit" name="retrasar" value="Retrasar">
                <input type="submit" name="validar2" value="Lista">
            </div>
        </form>

        <?php
        // Cliente REST de Servicio Web My Name Is Earl
        include 'curl_conexion.php';
        include 'config.php';

        $res = "";

        // (El bloque "if (isset($_REQUEST["validar2"]))" estaba aquí; se movió arriba)

        // Retrasar ofensa
        if (isset($_REQUEST["retrasar"])) {
            if (isset($_REQUEST["id"])) {
                $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
                // Lee los datos del registro a retrasar
                $url = "http://localhost/toni/exam_2t_Serv_Web/index.php?id=" . $id;
                $response = curl_conexion($url, "GET");
                $ofensa = json_decode($response, true);

                if (is_array($ofensa) && count($ofensa) === 1) {
                    // Insertar de nuevo
                    $params = array(
                        'nombre'    => $ofensa[0][1],
                        'ofensa'    => $ofensa[0][2],
                        'direccion' => $ofensa[0][3]
                    );
                    $url = "http://127.0.0.1:8000/index.php";
                    $response = curl_conexion($url, 'POST', $params);
                    $resPost = json_decode($response);

                    if (!strpos($resPost, "cURL Error #")) {
                        // Borrar el actual
                        $url = "http://127.0.0.1:8000/index.php" . $id;
                        $responseDel = curl_conexion($url, "DELETE");
                        $resDel = json_decode($responseDel);

                        if (!strpos($resDel, "cURL Error #")) {
                            $res = "Retrasado correctamente.";
                        } else {
                            $res = "No se ha eliminado el ID indicado, posible registro repetido o error!";
                        }
                    } else {
                        $res = "No se ha insertado al final, compruebe el ID a retrasar!";
                    }
                } else {
                    $res = "No se encontró la ofensa con el ID especificado o hubo error en la respuesta.";
                }
                echo $res;
            }
        }

        // Eliminar ofensa
        if (isset($_REQUEST["eliminar"])) {
            if (isset($_REQUEST["id"])) {
                $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
                $url = "http://127.0.0.1:8000/index.php" . $id;
                $response = curl_conexion($url, "DELETE");
                $resp = json_decode($response);
                $res = $resp;
                echo $res;
            }
        }
        ?>
    </div>
</body>

</html>