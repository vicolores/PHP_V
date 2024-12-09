<?php
// Iniciar la sesión
session_start();

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $color_favorito = $_POST['color_favorito'];

    // Guardar el usuario en la sesión (como un array asociativo)
    $_SESSION['usuarios'][$nombre] = [
        'edad' => $edad,
        'color_favorito' => $color_favorito
    ];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Usuarios</title>
</head>
<body>

<h2>Dar de alta un usuario</h2>
<form method="POST" action="index.php">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="edad">Edad:</label>
    <input type="number" id="edad" name="edad" required><br><br>

    <label for="color_favorito">Color favorito:</label>
    <input type="text" id="color_favorito" name="color_favorito" required><br><br>

    <input type="submit" value="Registrar Usuario">
</form>

<br>
<a href="consultas.php">Consultar usuario</a>

</body>
</html>
