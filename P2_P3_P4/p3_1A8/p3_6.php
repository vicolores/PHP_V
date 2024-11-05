<?php
/*
Haz un programa para codificar por desplazamiento una
frase utilizando el array de letras del ejercicio anterior. La idea es que
convierta cada letra por la siguiente del frase y a la última le
asigne la primera letra: a la "a" le corresponde la "b", a la "b" la "c", y así
sucesivamente hasta que a la "z" la "a". Si la frase contiene espacios
debe dejarlos igual.
Sugerencia: puede resultar útil la operación módulo para tratar los
índices del array.
*/

// Crear el array con las letras del frase en minúsculas
$frase= str_split("perro ladrador poco mordedor");
$fraseCodificada = "";

//$letraAascii =  
// Recorrer el array y mostrar cada letra en minúsculas y mayúsculas
foreach ($frase as $indice => $letra) {
    $posicionAsciiLetra = ord($letra);
    // 1. Restamos 97 para llevar el valor ASCII de la letra a un rango de 0 a 25.
    //    - El valor ASCII de 'a' es 97, por lo que restar 97 da 0.
    //    - El valor ASCII de 'b' es 98, por lo que restar 97 da 1, y así sucesivamente.
    // 2. Sumamos 1 para movernos a la siguiente letra en el alfabeto.
    // 3. Aplicamos el operador módulo 26 (`% 26`) para que cuando lleguemos a 25 (que representa 'z'),
    //    volvamos a 0 (que representa 'a'). Esto crea un ciclo en el alfabeto.
    // 4. Finalmente, sumamos 97 para volver a convertir el número en el rango de valores ASCII 
    //    correspondientes a las letras minúsculas ('a' = 97, 'z' = 122).

    $posicionAsciiNueva = (($posicionAsciiLetra - 97 + 1) % 26) + 97;
    // Convertimos de nuevo el valor ASCII a su carácter correspondiente y lo devolvemos.
    $letraSiguiente = chr($posicionAsciiLetra +1);
    
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