<?php
//**********************************FUNCIONES****************************************** */

function RellenaRegistro ($Datos){

    $Archivo = fopen("registro.txt" ,"a+");   

    fwrite($Archivo, $Datos);
    fclose($Archivo);
}

function LeerRegistro(){

    $Archivo = fopen("listado.txt", "r");

    $ArchivoLeido = fread($Archivo, filesize("listado.txt"));
    
    $FrutasCompletas = explode("\n", $ArchivoLeido);

    return $FrutasCompletas;
}
?>
