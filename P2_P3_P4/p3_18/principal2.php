<?php
$directorio = opendir("listar"); // Abre el directorio "listar"

while ($archivo = readdir($directorio)) {
    // Omite los directorios "." y ".."
    if ($archivo != "." && $archivo != "..") {
        $rutaCompleta = "listar/$archivo"; // Ruta completa del archivo o directorio

        if (is_file($rutaCompleta)) {
            echo "$archivo es un fichero.<br>";
        }
        if (is_dir($rutaCompleta)) {
            echo "$archivo es un directorio.<br>";
        }
    }
}
/*
    Omisión de . y ..:
    Al leer el contenido de un directorio, siempre aparecen . (directorio actual) y ..         (directorio padre), los cuales no deben procesarse como archivos o directorios.
*/

closedir($directorio); // Cierra el directorio
?>