<?php
// Iniciar la sesión
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre del usuario a consultar
    $nombre_a_consultar = $_POST['nombre'];

    // Comprobar si el usuario existe en la sesión
    if (isset($_SESSION['usuarios'][$nombre_a_consultar])) {
        $usuario = $_SESSION['usuarios'][$nombre_a_consultar];
        $mensaje = "Nombre: $nombre_a_consultar<br>Edad: " . $usuario['edad'] . "<br>Color favorito: " . $usuario['color_favorito'];
    } else {
        $mensaje = "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar Usuario</title>
</head>
<body>

<h2>Consultar Usuario</h2>
<form method="POST" action="consultas.php">
    <label for="nombre">Nombre del usuario:</label>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <input type="submit" value="Consultar">
</form>

<?php
// Mostrar el mensaje con los resultados
if (isset($mensaje)) {
    echo "<p>$mensaje</p>";
}
?>

<br>
<a href="index.php">Dar de alta un nuevo usuario</a>

</body>
</html>
