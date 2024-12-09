<?php
/* Función para la conexión a una BD */

 
function conexion_bd($serv, $user, $passwd, $bd){  
  $conexion_bd = @mysqli_connect($serv, $user, $passwd, $bd);
  $acentos = $conexion_bd->query("SET NAMES 'utf8'");
  if ($conexion_bd) {
	return($conexion_bd); 
  }
  else {
	return(NULL);
  }
}
?>
