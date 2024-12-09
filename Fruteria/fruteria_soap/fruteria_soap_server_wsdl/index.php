<?php
/* 
 * Ejemplo de Servios Web SOAP con fichero WSDL
 * Toma la BD de la fruteria para permitir consultas:
 *    Recibe la temporada y devuelve las frutas
 *    Recibe temporada y fruta devuelve el precio
 * Alta de nueva fruta, recibe temporada, fruta y precio
 * 
 * Como ejercicio añadir validación de usuarios para el alta
 * de forma que tome user, passwd y la info de la fruta para
 * darla de alta
 */
include_once 'fruteria.php'; //Clase con los métodos del Servicio Web
//require 'WSDLDocument.php'; // Crear el fichero WSDL


$uri = "http://localhost/toni/fruteria_soap_server_wsdl/";
$server = new SoapServer(null, array("uri"=>$uri));
$server->setClass("fruteria");
$server->handle(); 

//Crea el contenido del fichero WSDL, para ello necesita que la clase 
// se comente los parámetros de los métodos.
//$wsdl = new WSDLDocument("fruteria",
//                         "http://localhost/toni/fruteria_soap_server_wsdl/index.php",
//                         "http://localhost/toni/fruteria_soap_server_wsdl/");
//header('Content-Type: text/xml');
//echo $wsdl->saveXML();

?>