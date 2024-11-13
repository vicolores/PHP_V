<?php
/**
 * Usa un bucle for para imprimir por pantalla las horas del día y también en formato 12h.
 */

for ($i = 0; $i < 24; $i++) {
    if ($i < 12) {
        echo $i . "am\n" . "<br>";
    } else {
        echo ($i) . "pm\n" . "<br>";
    }
}
?>
<br><br>
<a href="/index.php">Volver</a>