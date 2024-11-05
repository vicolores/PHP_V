<?php
/*
Haz un array indexado numéricamente que contenga las
letras del abecedario en minúsculas. Luego recórrelo, y muéstralo por
pantalla cada letra del array, primero en minúsculas y luego en
mayúsculas.
*/

// Crear el array con las letras del abecedario en minúsculas
$abecedario = range('a', 'z');

// Recorrer el array y mostrar cada letra en minúsculas y mayúsculas
foreach ($abecedario as $indice => $letra) {
    echo "Índice $indice: $letra - " . strtoupper($letra) . "<br>";
}

