<?php

/* 
 *Función de conexión mediante cURL con servidores REST
 * Toma la $URL y el método GET, POTS, PUT o DELETE
 * y opcionalmente parámetros para el paso tipo POST
 */

function curl_conexion($url, $metodo, $params = NULL)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $metodo);
    if ($params != NULL) {
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
    }
    curl_setopt($curl, CURLOPT_HTTPHEADER, array("cache-control: no-cache"));
    // Ejecuta la llamada al servidor y obtiene la respuesta
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
        $response = json_encode("cURL Error #:" . $err);
    }
    return $response;
}
