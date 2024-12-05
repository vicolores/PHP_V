
<?php
DEFINE("SERVIDOR", "127.0.0.1");
DEFINE("USUARIO", "root");
DEFINE("CONTRASENA", "");
DEFINE("BD", "finadm");

function volver($resp = null) {
   echo "<br>";
   // Cambia los blancos por _ Con el GET solo envia la cadena hasta el primer espacio en blanco
   $resp = str_replace(" ", "_", $resp);
   echo "<a href=index.php?respuesta=" . $resp . " style='color:green;border:solid;padding:10px;'>Inicio</a>";
}
?>
