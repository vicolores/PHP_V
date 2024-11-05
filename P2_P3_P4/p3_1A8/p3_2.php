<?php
/*
Muestra de la frase "El perro de San Roque no tiene rabo":
    • Las letras totales de la frase.
    • El número de palabras de la frase.
    • Una línea con el número de letras de cada palabra.

    FRASE A ANALIZAR: 

    X letras
    x espacios en blanco
    x palabras

    palabra 7 letras
*/

$fraseAanalizar = "El perro de San Roque no tiene rabo";

// Inicialización de variables
$fraseArray = str_split($fraseAanalizar); // Convierte la frase en un array de caracteres.
$numeroLetrasPalabras = [];
$letrasTotales = 0;
$palabrasTotales = 0;
$espaciosBlancos = 0;
$palabrasEnteras = "";
$numeroLetrasPalabrasArray = [];

// Recorremos el array de caracteres para contar letras, palabras y espacios
foreach ($fraseArray as $key => $value) {
    // Si no es un espacio, sumamos al contador de letras, cada espacio representa el final de una palabra.
    if ($value !== " ") { 
        $letrasTotales++;           // Almacena el número de letras totales sin espacios.
        $palabrasEnteras .= $value; // Concatenamos las letras para formar la letra.
    } else {
        $palabrasTotales++; // Contamos la palabra cuando encontramos un espacio.
        $espaciosBlancos++; // Contamos los espacios en blanco.
                            // Guardamos el número de letras de la palabra actual y el nombre del indice.
        $numeroLetrasPalabrasArray[$palabrasEnteras] = strlen($palabrasEnteras); 
        $palabrasEnteras = ""; // Reiniciamos la palabra, ya que está almacenada en el array numeroLetrasPalabrasArray
    }
}

// Verifica si la clave actual ($key) es igual al último índice del array $fraseArray.
// Esto se hace restando 1 al número total de elementos del array (count($fraseArray) - 1).
// Si $key es igual a este valor, significa que estamos en el último elemento del array.
// Código que se ejecuta cuando se llega al último elemento del array $fraseArray.
// Por ejemplo, aquí se podría realizar alguna operación específica para el último carácter de la frase.

/* if ($key == (count($fraseArray)-1)) {
    $palabrasTotales++;
    $numeroLetrasPalabrasArray[$palabrasEnteras] = strlen($palabrasEnteras);
} */
if (end($fraseArray)) { // Si es el último elemento del array
    $palabrasTotales++;
    $numeroLetrasPalabrasArray[$palabrasEnteras] = strlen($palabrasEnteras);
}
//print_r($numeroLetrasPalabrasArray);
// Mostramos los resultados
echo ("La frase tiene " . $letrasTotales . " letras.</br>");
echo ("La frase tiene " . $espaciosBlancos . " espacios en blanco.</br>");
echo ("La frase tiene " . $palabrasTotales . " palabras.</br>");
echo "<br>Número de letras por palabra:<br>";

// Imprimimos el número de letras de cada palabra
foreach ($numeroLetrasPalabrasArray as $palabra => $longitud) {
    echo $palabra . " tiene " . $longitud . " letras.</br>";
}
?>