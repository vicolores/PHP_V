<?php
// codificacion.php

/**
 * Codifica una frase utilizando el cifrado César con un desplazamiento específico.
 *
 * @param string $frase La frase a codificar.
 * @param int $desplazamiento El número de posiciones para desplazar cada letra.
 * @return string La frase codificada.
 */
function codificarFrase($frase, $desplazamiento) {
    $abecedario = range('a', 'z');

    $fraseArray = str_split($frase);  // Convertimos la frase en un array de letras
    $fraseCodificada = "";  // Variable para guardar la frase codificada

    foreach ($fraseArray as $letra) {

        if ($letra == " ") {
            // Si es un espacio, simplemente añadimos el espacio a la frase codificada
            $fraseCodificada .= " ";
        } else {
            // Para buscar la letra en el abecedario
            $indiceActual = array_search($letra, $abecedario);

            // Calculamos el nuevo índice con desplazamiento y ciclo en el abecedario
            $nuevoIndice = ($indiceActual + $desplazamiento) % 26;  // %26 para ajustar el ciclo del abecedario

            // Obtenemos la letra correspondiente al nuevo índice
            $letraSiguiente = $abecedario[$nuevoIndice];

            // Añadimos la letra codificada a la frase
            $fraseCodificada .= $letraSiguiente;
        }
    }

    // Imprimimos la frase codificada
    return $fraseCodificada;
}
?>
