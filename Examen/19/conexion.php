<?php
function conectarBaseDatos($servidor = '127.0.0.1', $usuario = 'mariadb', $contrasena = 'mariadb', $baseDatos = 'mariadb') {
    $conexion = new mysqli($servidor, $usuario, $contrasena, $baseDatos);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    return $conexion;
}
?>
