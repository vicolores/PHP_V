<?php
// Función para recorrer recursivamente directorios
function listarArchivosRecursivo($pathDirectorio) {
  // Introducir el tipo de extension de archivo a visualizar
  $extension = "php";

  // Abre el directorio
  if (is_dir($pathDirectorio) && $handler = opendir($pathDirectorio)) {
    // Lee los archivos y directorios dentro del directorio actual
    while (($archivo = readdir($handler)) !== false) {
      // Omite los directorios "." y ".." (1)
      if ($archivo != "." && $archivo != "..") {

        // Obtener la ruta completa del archivo o directorio
        $rutaCompleta = "$pathDirectorio/$archivo";

        // Verifica si es un archivo con la extensión específica (2)
        if (is_file($rutaCompleta) && pathinfo($rutaCompleta, PATHINFO_EXTENSION) === $extension) {
          echo "$rutaCompleta es un fichero .php<br>";
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

/* (1)
  Omisión de . y ..:
  Al leer el contenido de un directorio, siempre aparecen . (directorio actual) y .. (directorio padre), los cuales no deben procesarse como archivos o directorios.
*/
/* (2)
// Verifica si la ruta actual corresponde a un archivo y si su extensión coincide con la especificada.
// 1. `is_file($rutaCompleta)`: Comprueba si `$rutaCompleta` es un archivo regular y no un directorio.
//     - Esto garantiza que solo se procesen archivos y no directorios.
// 2. `pathinfo($rutaCompleta, PATHINFO_EXTENSION)`: Extrae la extensión del archivo a partir de su ruta completa, como un array
  Array
  (
    [dirname] => /ruta/al/directorio
    [basename] => archivo.php
    [extension] => php
    [filename] => archivo
  )

//     - `pathinfo()` devuelve información detallada de la ruta del archivo, y `PATHINFO_EXTENSION` solo devuelve la extensión (sin el punto).
  Si solo quieres obtener un componente específico, puedes usar las siguientes constantes de pathinfo():

    PATHINFO_DIRNAME: Devuelve solo el directorio.
    PATHINFO_BASENAME: Devuelve el nombre completo del archivo con su extensión.
    PATHINFO_EXTENSION: Devuelve solo la extensión del archivo.
    PATHINFO_FILENAME: Devuelve solo el nombre del archivo sin la extensión.
  
//     - Por ejemplo, si `$rutaCompleta` es "/ruta/archivo.php", esta función devolverá "php".
// 3. `=== $extension`: Compara la extensión extraída con el tipo de archivo deseado (almacenado en la variable `$extension`).
//     - Se utiliza la comparación estricta (`===`) para asegurar que tanto el valor como el tipo coincidan exactamente.
// 4. Si ambas condiciones son verdaderas (es un archivo y la extensión coincide), se ejecuta el bloque de código dentro de la estructura `if`.

*/
?>
