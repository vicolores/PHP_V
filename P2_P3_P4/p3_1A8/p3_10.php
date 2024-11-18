<?php
/*
Escribe el código para las siguientes funciones. 
• Función pesetas_a_euros($pesetas): recibe como parámetro un 
valor en pesetas y devuelve el equivalente en euros (1 euro = 
166.368 ptas).
• Función euros_a_pesetas($euros): recibe como parámetro un
valor en euros y devuelve el equivalente en pesetas.
Modifica el programa del ejercicio 3.9 para mostrar el tiquet de 
compras en euros y en pesetas haciendo la conversión con estas 
funciones. 
*/
function pesetas ($pesetas) {
    $euros = $pesetas / 166.386;
    return $euros; 
}
function euros ($euros) {
    $pesetas = $euros * 166.386;
    return $pesetas; 
}
$producto = array(
    "Judias" => "3.5",
    "Patatas" => "0.4",
    "Tomates" => "1",
    "Manzanas" => "1.2",
    "Uvas" => "2.5"
);
$lista_compra = array(
    "Judias" => "1.21",
    "Patatas" => "1.73",
    "Tomates" => "2.08",
    "Manzanas" => "2.15",
    "Uvas" => "0.77"
);
$total = 0;

// Usamos un bucle foreach para recorrer los arrays asociativos
foreach ($producto as $i => $precio) {
    // Comprobamos si el producto existe en la lista de compra
    if ($lista_compra[$i]) {
        $multiplicar = $precio * $lista_compra[$i];
        echo "El producto $i tiene un precio de $precio y una cantidad de $lista_compra[$i] y el precio total es: $multiplicar.<br>";

    } else {
        // Si el producto no está en la lista de compra, mostramos un mensaje alternativo
        echo "El producto $i no se encuentra en la lista de compra.<br>";
    }
    $total += $multiplicar;  
}
echo ("El precio total es: $total .<br>");
echo ("El precio total en pesetas es: " . number_format(euros($total),2) . "<br>");
?>
<br><br>
<a href="/index.php">Volver</a>
