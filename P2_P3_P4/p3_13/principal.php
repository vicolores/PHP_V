<?php
// principal.php

// Incluir la biblioteca de funciones
require_once 'cripto.php';

// Array de ciudades a codificar
$arrayCiudad = array("Valencia", "Madrid", "Barcelona", "Sevilla", "Zaragoza");

// Array para almacenar las ciudades codificadas
$arrayCiudadCodificada = array();

// Recorrer cada ciudad y codificarla
foreach ($arrayCiudad as $ciudad){

  $ciudadMinuscula = strtolower($ciudad);
    // Codificar la ciudad utilizando la función codificarFrase con un desplazamiento de 4
  
  $codificado = codificarFrase($ciudadMinuscula, 4);
    
    // Almacenar la ciudad codificada en el nuevo array
  $arrayCiudadCodificada[] = $codificado;
    
    // (Opcional) Si deseas decodificar la ciudad, descomenta las siguientes líneas
    // $decodificado = decodificarFrase($codificado, 4);
    // $arrayCiudadDecodificada[] = $decodificado;
}

// Convertir los arrays a cadenas para mostrarlos
$cadenaOriginal = implode(", ", $arrayCiudad);
$cadenaCodificada = implode(", ", $arrayCiudadCodificada);

// Mostrar el resultado
echo "Frase original: $cadenaOriginal.<br>"; 
echo "Frase codificada: $cadenaCodificada.<br>";

// (Opcional) Mostrar ciudades decodificadas
// $cadenaDecodificada = implode(", ", $arrayCiudadDecodificada);
// echo "Frase decodificada: $cadenaDecodificada.<br>";
?>
