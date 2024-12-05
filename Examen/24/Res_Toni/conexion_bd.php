<?php
  /*
   Función de conexión a la BBDD.  
  */

  function conexion_bd($bd_serv, $user, $passwd, $bd) {
	  $con = @mysqli_connect($bd_serv, $user, $passwd, $bd);
        
    if(mysqli_connect_errno()){ //Si error en conexion
		 $con =false;
    }
	  return($con);
  }

  function cierra_conexion($con) {
    $res = mysqli_close($con);
    if($res){
      $mensaje = "BD cerrada <br>";
    }
    else {
      $mensaje = "Error al cerrar BD <br>";
    }
    return $mensaje;
  }
?>
	
