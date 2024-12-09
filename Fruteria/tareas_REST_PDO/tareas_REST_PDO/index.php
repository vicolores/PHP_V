<?php

/* 
 *  Toma el nombre del operario y le devuelve la primera tarea pendiente, 
 * esta pasa a ASIGNADA y pone el operario
 * Funciona como un servidor REST
 */
include 'tarea.php';
$tarea = new Tarea();
$metodo = $_SERVER['REQUEST_METHOD'];

//$recurso = $_SERVER['REQUEST_URI'];
$recurso = filter_input(INPUT_SERVER, 'REQUEST_URI',FILTER_SANITIZE_URL);

//echo $metodo . "<br>" . $recurso . "<br>"; 
switch($metodo){
    case 'GET':
        $id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_STRING);
        $respuesta = $tarea->finalizaTarea($id);
        break;
    case 'PUT':
        $oper = filter_input(INPUT_GET, 'operario',FILTER_SANITIZE_STRING);
        $respuesta = $tarea->asignaTarea($oper);
        break;
    case 'DELETE':
        if(isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            $aux = (int)$id;
            if (is_int($aux)){ // Comprueba que represente un entero
                $respuesta = $tarea->eliminarTarea($id);
            }
            else{
                $respuesta = "ID no válida" . $id;
            }    
        }    
        break;
    case 'POST':
        $numserie = filter_input(INPUT_POST, 'numserie',FILTER_SANITIZE_STRING);
        $descripcion = filter_input(INPUT_POST, 'descripcion',FILTER_SANITIZE_STRING);
      
        $respuesta = $tarea->crearTarea($numserie, $descripcion);
        break;
    default:
        $respuesta ="Opción incorrecta!!!!";
 
}
echo json_encode ($respuesta, true);

 
 
