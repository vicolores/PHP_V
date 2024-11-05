<?php
// principal.php

// Incluir la biblioteca de funciones
require_once 'cripto.php';

// Definir el desplazamiento y la frase a codificar
$desplazamiento = 4;
$frase = "perro ladrador poco mordedor";

// Codificar la frase utilizando la función importada
$fraseCodificada = codificarFrase($frase, $desplazamiento);

// Mostrar el resultado
echo "Frase original: $frase .<br>"; 
echo "Frase codificada: $fraseCodificada .<br>";
?>
