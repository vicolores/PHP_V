<?php
/*
Modifica el programa anterior para que el desplazamiento
sea variable. Es decir, en un desplazamiento 3 se transforma la letra por
la que está 3 posiciones más adelante.
*/

// Crear el array con las letras del frase en minúsculas
$frase= str_split("perro ladrador poco mordedor");
$fraseCodificada = "";
// Desplazamiento variable (por ejemplo, 3)
$desplazamiento = 3;

//$letraAascii =  
// Recorrer el array y mostrar cada letra en minúsculas y mayúsculas
foreach ($frase as $indice => $letra) {
    $posicionAsciiLetra = ord($letra);

    $posicionAsciiNueva = (($posicionAsciiLetra - 97 + 3) % 26) + 97;
    // Convertimos de nuevo el valor ASCII a su carácter correspondiente y lo devolvemos.
    $letraSiguiente = chr($posicionAsciiLetra + 3);
    
    if ($letra === " ") {
        $fraseCodificada .= " ";
    } else {
        // Obtener la siguiente letra y añadirla a la frase codificada
        $fraseCodificada .= $letraSiguiente;
        echo "Índice $indice: $letra - " . $letraSiguiente . "<br>";
    }
}
// Mostrar la frase original y la frase codificada
// implode() Se utiliza para convertir un array en una cadena de texto, uniendo todos sus elementos
echo "Frase original: " . implode($frase) . "<br>";
echo "Frase codificada: " . $fraseCodificada;
?>