<?php
// Verificar que la petición sea un POST y que el campo 'comentario' esté presente
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comentario'])) {
    // Recortar espacios en blanco alrededor del comentario
    $comentario = trim($_POST['comentario']);

    // Validar que el comentario no esté vacío
    if (!empty($comentario)) {
        // Definir el archivo donde se guardarán los comentarios
        $file = 'visitas.txt';

        // Añadir el comentario al archivo, con un salto de línea
        file_put_contents($file, $comentario . PHP_EOL, FILE_APPEND);

        // Redirigir al usuario de vuelta a la página de comentarios después de guardar
        header('Location: libro_visitas.php');
        exit;
    } else {
        // Si el comentario está vacío, mostrar un mensaje de error
        echo "El comentario no puede estar vacío.";
    }
} else {
    // Si se accede a esta página sin enviar el formulario, mostrar un mensaje de error
    echo "Acceso no válido.";
}
