<?php
// Comprobamos si el parámetro 'signo' ha sido enviado a través de la URL (método GET).
if (isset($_GET['signo'])) {
    // Si el parámetro 'signo' existe, lo asignamos a la variable $signo.
    // La función htmlspecialchars() convierte caracteres especiales a entidades HTML.
    // Esto previene posibles inyecciones de código y mejora la seguridad.
    $signo = htmlspecialchars($_GET['signo']);

    // Mostramos un mensaje con el signo seleccionado, capitalizando la primera letra con ucfirst().
    // ucfirst() transforma la primera letra de la cadena a mayúscula.
    echo "<h1>El signo zodiacal seleccionado es: " . ucfirst($signo) . "</h1>";
} else {
    // Si el parámetro 'signo' no ha sido enviado o está vacío, mostramos un mensaje alternativo.
    echo "<h1>No se ha seleccionado ningún signo zodiacal.</h1>";
}
// Botón para regresar al formulario de selección
echo '<br><br>';
echo '<button onclick="window.location.href=\'zodiaco.php\'">Volver al menú de selección</button>';
?>
