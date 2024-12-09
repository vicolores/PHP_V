<?php

/* 
 * Ejemplo de Servios Web SOAP
 * Toma la BD de la fruteria para permitir consultas:
 *    Recibe la temporada y devuelve las frutas
 *    Recibe temporada y fruta devuelve el precio
 * Alta de nueva fruta, recibe temporada, fruta y precio
 * 
 * Como ejercicio añadir validación de usuarios para el alta
 * de forma que tome user, passwd y la info de la fruta para
 * darla de alta
 */
include 'funcion_conexion_bd.php';
DEFINE ("SERVIDOR", "localhost");
DEFINE ("USER", "root");
DEFINE ("PASSWD", "");
DEFINE ("BASE_DATOS", "fruteria");

function temporada($temporada){
    $con_bd = conexion_bd(SERVIDOR, USER, PASSWD,  BASE_DATOS);
    if($con_bd){
        $sql = "SELECT fruta FROM precios WHERE temporada = '" . $temporada  . "'";
        if($res = mysqli_query($con_bd, $sql)) {
           if(mysqli_num_rows($res) >= 1){ // Ha encontrado las frutas
              $res_array = mysqli_fetch_all($res, MYSQLI_NUM);
           }
           else {
               $res_array = new SoapFault("1", "Error Temporada no encontrada");
           }
        }
        $cierre_bd = @mysqli_close($con_bd);
        return $res_array;
    }
}

function fruta ($temporada, $fruta){
    $con_bd = conexion_bd(SERVIDOR, USER, PASSWD,  BASE_DATOS);
    if($con_bd){
      $sql = "SELECT * FROM precios WHERE temporada = '" . $temporada  . "' and fruta = '" . $fruta . "'";
      if($res = mysqli_query($con_bd, $sql)) {
         if(mysqli_num_rows($res) >= 1){ // Ha encontrado las frutas
            $res_array = mysqli_fetch_all($res, MYSQLI_ASSOC);
         }
         else {
             $res_array = new SoapFault("1", "Error fruta no encontrada");
         }
      }
      $cierre_bd = @mysqli_close($con_bd);
      return $res_array;
    }
}

$uri = "http://localhost/toni/fruteria_soap_server/";
$server = new SoapServer(null, array("uri"=>$uri));
$server->addFunction("temporada");
$server->addFunction("fruta");
$server->handle(); 

?>