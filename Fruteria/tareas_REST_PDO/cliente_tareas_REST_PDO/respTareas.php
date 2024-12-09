<?php

/* 
 * Llama al servicio Web y muestra el resultado.
 */

if (isset($_REQUEST["validar"])) {
    if (isset($_REQUEST["operario"])) {
        $operario = filter_input(INPUT_POST, "operario", FILTER_SANITIZE_STRING);
        $operario = strtoupper($operario);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://localhost/toni/tareas_REST_PDO/index.php?operario=" . $operario);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("cache-control: no-cache"));
        // Ejecuta la llamada al servidor y obtiene la respuesta
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo "<br>RESPUESTA: <br>" . json_decode($response);
        }
    }
}
if (isset($_REQUEST["finalizar"])) {
    if (isset($_REQUEST["id1"])) {
        $id = filter_input(INPUT_POST, "id1", FILTER_SANITIZE_STRING);
        // Probamos el GET con file_get_content
        $response = file_get_contents("http://localhost/toni/tareas_REST_PDO/index.php?id=" . $id);
        echo "<br>RESPUESTA: <br>" . json_decode($response);

        // GET con curl
        /*  $curl = curl_init();  
        curl_setopt($curl, CURLOPT_URL, "http://localhost/toni/tareas_REST/index.php?id=" . $id);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("cache-control: no-cache"));
        // Ejecuta la llamada al servidor y obtiene la respuesta
        $response = curl_exec($curl);
        $err = curl_error($curl); 
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
        else {
            echo "<br>RESPUESTA: <br>" . json_decode($response);
        }*/
    }
}
if (isset($_REQUEST["eliminar"])) {
    if (isset($_REQUEST["id2"])) {
        $id = filter_input(INPUT_POST, "id2", FILTER_SANITIZE_STRING);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://localhost/toni/tareas_REST_PDO/index.php?id=" . $id);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("cache-control: no-cache"));
        // Ejecuta la llamada al servidor y obtiene la respuesta
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo "<br>RESPUESTA eliminar: <br>" . json_decode($response);
        }
    }
}
if (isset($_REQUEST["crear"])) {
    if (isset($_REQUEST["numserie"])) { // Es opcional
        $numserie = filter_input(INPUT_POST, "numserie", FILTER_SANITIZE_STRING);
    } else {
        $numserie = NULL;
    }
    if (isset($_REQUEST["descripcion"])) {
        $descripcion = filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_STRING);

        $params = array('numserie' => $numserie, 'descripcion' => $descripcion);

        // Prepara la llamada POST al servidor para crear una nueva tarea con
        // el número de serie y la descripción de la tarea
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://localhost/toni/tareas_REST_PDO/index.php");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        //curl_setopt($curl, CURLOPT_PUT, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("cache-control: no-cache"));
        // Ejecuta la llamada al servidor y obtiene la respuesta
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo "<br>RESPUESTA: <br>" . json_decode($response);
        }
    }
}

echo "<br><a href='index.php'>índice</a>";
