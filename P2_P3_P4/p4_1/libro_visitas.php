<!DOCTYPE html>
<html>
<head>
    <title>Libro de Visitas</title>
</head>
<body>
    <h1>Comentarios de los Visitantes</h1>

    <?php
    // Definir el nombre del archivo donde se guardan los comentarios
    $file = 'visitas.txt';

    // Verificar si el archivo existe antes de intentar leerlo
    if (file_exists($file)) {
        // Leer el contenido del archivo línea por línea, ignorando líneas vacías
        $visitas = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Mostrar cada comentario en un párrafo
        foreach ($visitas as $visita) {
            echo "<p>" . htmlspecialchars($visita) . "</p>";
        }
    } else {
        // Si el archivo no existe o no hay comentarios, mostrar este mensaje
        echo "<p>No hay comentarios aún.</p>";
    }
    ?>

    <!-- Enlace para añadir un nuevo comentario -->
    <a href="nueva_visita.php">Añadir Comentario</a><br><br>

    <!-- Enlace para volver a la página de inicio -->
    <a href="index.php">Volver al inicio</a>
</body>
</html>
