<?php

require_once 'llistarArchivosRecursivo.php';

$pathDirectorio = "listar"; // Abre el directorio “listar”

// Obtener la ruta completa
$rutaCompleta = realpath($pathDirectorio);

// Mostrar la ruta completa
//echo "Ruta completa: $rutaCompleta <br>";

listarArchivosRecursivo($pathDirectorio);
?>
<h3><a href="/index.php">Volver al índice</a></h3>

