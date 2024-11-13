<?php
/**
 *  Usa dos bucles for anidados para imprimir por pantalla las horas del día y sus cuartos.
 */

for ($i = 0; $i < 24; $i++) {
    if ($i < 12) {
        echo $i . "am\n" . "<br>";
    } else {
        echo ($i) . "pm\n" . "<br>";
    }
    for ($j = 0; $j < 4; $j++) {
        echo $i . ":" . $j * 15 . "\n" . "<br>";
    }
}
?>
<br><br>
<a href="/index.php">Volver</a>