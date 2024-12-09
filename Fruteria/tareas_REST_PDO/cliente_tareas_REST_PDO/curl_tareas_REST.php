<?php

/* 
 * Cliente de prueba de tareas_REST
 */

//$response = file_get_contents('http://localhost/toni/tareas_REST/index.php');
// 
// 
//$response = json_decode($response);
//echo "Saludo que viene del servidor:<br>" . $response;


$params = '';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://localhost/toni/tareas_REST_PDO/index.php");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($curl, CURLOPT_HTTPHEADER, array("cache-control: no-cache"));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    //if (!$response) {
    echo "cURL Error #:" . $err;
} else {

    echo "<br>RESPUESTA: <br>" . json_decode($response);
    // var_dump($response);
}
