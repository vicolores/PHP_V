<?php

require_once 'conv_precios.php';

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

echo "<br>";
echo "El precio total es: <strong>" . number_format($total, 2) . " €</strong>.<br>";
echo "El precio total en pesetas es: <strong>" . number_format(euros($total), 2) . " Ptas</strong>.<br>";
?>
