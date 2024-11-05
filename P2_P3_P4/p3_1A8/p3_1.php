p3<?php
/* Crea la función mostrar_impares que muestre los
caracteres en posiciones impares de una cadena predefinida. Ejecútalo
con la frase "A quien madruga Dios le ayuda"*/

function mostrar_impares($cadenaBase)
{
    foreach ($cadenaBase as $indice => $valor) {
        if (($indice % 2) != 0) { // Verificamos que el índice sea impar
            echo $valor;
        }
    }
}

$cadenaBase = str_split("A quien madruga Dios le ayuda");
$cadenaSinEspacios = []; // Nuevo array para almacenar los valores sin espacios

foreach ($cadenaBase as $indice => $valor) {
    if ($valor !== " ") {
        array_push($cadenaSinEspacios, $valor); // Añadimos al nuevo array sin espacios
    }
}

// Ahora llamamos a la función con $cadenaSinEspacios
mostrar_impares($cadenaSinEspacios);
