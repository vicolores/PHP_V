<?php
/**
 *  Usa dos bucles for anidados para imprimir por pantalla las horas del día y sus cuartos.
 *  Por ejemplo: Son la 10 AM y 45 minutos.
 */

for ($i = 0; $i < 24; $i++) {
    if ($i < 12) {
        for ($j = 0; $j < 4; $j++) {
        echo "Son las " . $i . " AM" . " y " . $j * 15 . " minutos" . "\n" . "<br>";
        }
    } else {
        for ($j = 0; $j < 4; $j++) {
        echo "Son las " . $i . " PM" . " y " . $j * 15 . " minutos" . "\n" . "<br>";
        }
    }
}
?>
<br><br>
<a href="/index.php">Volver</a>