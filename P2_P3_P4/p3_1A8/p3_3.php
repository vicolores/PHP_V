<?php
/*
Comprobar si un NIF es válido. Un NIF debe constar
exactamente de 8 números y una letra. Para comprobar si un carácter
es un número o una letra se puede usar la función ord() que nos da el
código ASCII de dicho carácter. En el código ASCII los números se
encuentran en las posiciones 48 a 57 y las letras en las posiciones 65 a 90
(mayúsculas) y 97 a 122 (minúsculas). Una vez comprobado que es
correcto debe mostrar el DNI por pantalla con la última letra en
mayúsculas, independientemente de cómo estuviera en el dato de
entrada.
*/

$nif = "12345678a"; // DNI de prueba. Puedes cambiarlo para verificar otros.
$nifPorCarac = str_split($nif); // Separa el NIF en un array de caracteres.

// Verifica si el NIF tiene exactamente 9 caracteres.
if (count($nifPorCarac) === 9) {
    $nifCorrecto = true; // Bandera para verificar si el NIF es válido.

    // Recorre cada carácter del NIF.
    foreach ($nifPorCarac as $key => $valor) {
        $testCaracter = ord($valor); // Obtiene el código ASCII del carácter.

        // Verifica si es un número (caracteres 0-7 deben ser números).
        if ($key < 8 && ($testCaracter < 48 || $testCaracter > 57)) {
            echo "Error: El carácter en la posición " . ($key + 1) . " no es un número.<br>";
            $nifCorrecto = false;
            break;
        }

        // Verifica si la última posición es una letra.
        if ($key === 8 && !((($testCaracter >= 65 && $testCaracter <= 90) || ($testCaracter >= 97 && $testCaracter <= 122)))) {
            echo "Error: El último carácter no es una letra válida.<br>";
            $nifCorrecto = false;
            break;
        }
    }

    // Si todos los caracteres son válidos, muestra el NIF con la letra en mayúscula.
    if ($nifCorrecto) {
        $letraFinal = strtoupper($nifPorCarac[8]); // Convierte la letra final a mayúscula.
        echo "El NIF válido es: " . substr($nif, 0, 8) . $letraFinal;
    }
} else {
    echo "Error: El NIF debe tener exactamente 8 números y una letra.";
}
?>