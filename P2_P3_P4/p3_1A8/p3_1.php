<?php
/**
 * Crea la función mostrar_impares que muestre los 
 * caracteres en posiciones impares de una cadena predefinida. Ejecútalo
 * con la frase "A quien madruga Dios le ayuda".
 */

function mostrar_impares($cadena) {
    
    // Eliminamos todos los espacios de la cadena
    $cadena = str_replace(' ', '', $cadena);
    
    $cadenaImpares = array(); // Inicializamos un array para almacenar los caracteres impares

    // Iteramos a través de la cadena
    for ($i = 0; $i < strlen($cadena); $i++) {
        // Comprobamos si la posición es impar
        if ($i % 2 != 0) {
            $cadenaImpares[] = $cadena[$i]; // Añadimos el carácter al array
        }
    }

    // Convertimos el array en una cadena y la mostramos
    echo implode('', $cadenaImpares) . "\n";
}

// Cadena predefinida
$frase = "A quien madruga Dios le ayuda";

// Llamamos a la función con la frase definida
mostrar_impares($frase);
?>
<br><br>
<a href="/index.php">Volver</a>
<?php
/*
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
<?
*/
?>