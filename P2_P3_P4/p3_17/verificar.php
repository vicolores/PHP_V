<?php
require_once 'usuarios.php';
require_once 'ok.php';

// Verifica si los datos de usuario y contraseña fueron enviados
if (isset($_POST['usuario']) && isset($_POST['contraseña'])) {
  $usuario = $_POST['usuario'];
  $contraseña = $_POST['contraseña'];

  if (validarUsuario($usuario, $contraseña)) {
    // Guardar nombre y contraseña en el archivo acceso.txt
    $archivo = fopen("acceso.txt", "a");

    // Escribe el acceso al archivo (sin incluir la contraseña por seguridad)
    fwrite($archivo, "El Usuario: $usuario, ha accedido al sistema \n");

    // Cierra el archivo
    fclose($archivo);

    // Llama a la función de éxito
    ok($usuario, $contraseña);
  } else {
    // Registrar el intento fallido de acceso
    $archivo = fopen("acceso.txt", "a");
    fwrite($archivo, "Intento fallido de acceso del Usuario: $usuario \n");
    fclose($archivo);

    // Redirige a una página de error
    header("Location: error.html");
    exit(); 
  }
} else {
  // Mensaje para datos faltantes
  echo "Comprueba si tus datos son correctos.<br>";
  echo "<br>";
}
?>

?>
