<?php
// Función para recorrer recursivamente directorios
function listarArchivosRecursivo($pathDirectorio) {
  // Abre el directorio
  if (is_dir($pathDirectorio) && $handler = opendir($pathDirectorio)) {
    // Lee los archivos y directorios dentro del directorio actual
    while (($archivo = readdir($handler)) !== false) {
      // Omite los directorios "." y ".."
      if ($archivo != "." && $archivo != "..") {
        
        // Obtener la ruta completa del archivo o directorio
        $rutaCompleta = "$pathDirectorio/$archivo";

        // Verifica si es un archivo
        if (is_file($rutaCompleta)) {
          echo "$rutaCompleta es un fichero.<br>";
        }

        // Verifica si es un directorio y hace la llamada recursiva
        if (is_dir($rutaCompleta)) {
          echo "$rutaCompleta es un directorio.<br>";
          listarArchivosRecursivo($rutaCompleta); // Llamada recursiva
        }
      }
    }
    closedir($handler);
  } else {
    echo "El directorio $pathDirectorio no existe o no es accesible.";
  }
}

// Llamada inicial a la función para listar archivos y directorios recursivamente
//listarArchivosRecursivo("listar");

/*
  Omisión de . y ..:
  Al leer el contenido de un directorio, siempre aparecen . (directorio actual) y .. (directorio padre), los cuales no deben procesarse como archivos o directorios.
*/
?>
