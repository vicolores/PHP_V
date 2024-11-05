<?php
// Verificar si se ha enviado un archivo
if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0) {
    $nombreArchivo = $_FILES['archivo']['name'];
    $rutaTemporal = $_FILES['archivo']['tmp_name'];
    $tamanioArchivo = $_FILES['archivo']['size'];
    $directorioDestino = __DIR__ . '/descargas/' . $nombreArchivo;

    // Mover el archivo al directorio de descargas
    if (move_uploaded_file($rutaTemporal, $directorioDestino)) {
        echo "<h1>Archivo subido con éxito</h1>";
        echo "<p>Nombre: $nombreArchivo</p>";
        echo "<p>Tamaño: " . round($tamanioArchivo / 1024, 2) . " KB</p>";
    } else {
        echo "<h1>Error al subir el archivo</h1>";
    }
} else {
    echo "<h1>No se ha subido ningún archivo</h1>";
}
?>
<br>
<a href="subir.php">Subir otro archivo</a><br>
<a href="listar.php">Listar archivos</a>
