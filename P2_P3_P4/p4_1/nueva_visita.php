<!DOCTYPE html>
<html>
<head>
    <title>Añadir Comentario</title>
</head>
<body>
    <h1>Añadir un Nuevo Comentario</h1>

    <!-- Formulario para enviar un nuevo comentario -->
    <form action="insertar_visita.php" method="post">
        <!-- Campo de texto para el comentario, es obligatorio (required) -->
        <label for="comentario">Comentario:</label>
        <textarea name="comentario" id="comentario" rows="4" cols="50" required></textarea><br><br>
        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Enviar">
    </form>

    <!-- Enlace para volver a la página de comentarios -->
    <a href="libro_visitas.php">Ver Comentarios</a><br><br>

    <!-- Enlace para volver a la página de inicio -->
    <a href="index.php">Volver al inicio</a>
</body>
</html>
