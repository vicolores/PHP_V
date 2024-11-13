<?php
/*
 * Crea un programa que muestre un tíquet de compra de 
 * una frutería. Los precios de los productos se deben guardar en 
 * constantes y los pesos en variables.
 */

define("PRECIO_JUDIAS", 3.50);
define("PRECIO_PATATAS", 0.40);
define("PRECIO_TOMATES", 1.00);
define("PRECIO_MANZANAS", 1.20);
define("PRECIO_NARANJAS", 1.60);

$peso_judias = 1.21;
$peso_patatas = 2.50;
$peso_tomates = 1.00;
$peso_manzanas = 1.50;
$peso_naranjas = 2.00;

$coste_judias = PRECIO_JUDIAS * $peso_judias;
$coste_patatas = PRECIO_PATATAS * $peso_patatas;
$coste_tomates = PRECIO_TOMATES * $peso_tomates;
$coste_manzanas = PRECIO_MANZANAS * $peso_manzanas;
$coste_naranjas = PRECIO_NARANJAS * $peso_naranjas;

echo "<pre>TICKET DE COMPRA\n";

// Encabezados de las columnas
echo str_pad("Producto", 15) . str_pad("Precio/kg", 15) . str_pad("Peso", 10) . "Coste\n";

// Línea separadora para claridad
echo str_repeat("-", 50) . "\n";

// Fila para cada producto
echo str_pad("Judías\t", 15) . str_pad(number_format(PRECIO_JUDIAS, 2), 15) . str_pad(number_format($peso_judias, 2), 10) . number_format($coste_judias, 2) . "\n";
//echo str_pad("Judías", 15, " ", STR_PAD_RIGHT) . str_pad(number_format(PRECIO_JUDIAS, 2), 15, " ", STR_PAD_RIGHT) . str_pad(number_format($peso_judias, 2), 10, " ", STR_PAD_RIGHT) . number_format($coste_judias, 2) . "\n";
echo str_pad("Patatas", 15) . str_pad(number_format(PRECIO_PATATAS, 2), 15) . str_pad(number_format($peso_patatas, 2), 10) . number_format($coste_patatas, 2) . "\n";
echo str_pad("Tomates", 15) . str_pad(number_format(PRECIO_TOMATES, 2), 15) . str_pad(number_format($peso_tomates, 2), 10) . number_format($coste_tomates, 2) . "\n";
echo str_pad("Manzanas", 15) . str_pad(number_format(PRECIO_MANZANAS, 2), 15) . str_pad(number_format($peso_manzanas, 2), 10) . number_format($coste_manzanas, 2) . "\n";
echo str_pad("Naranjas", 15) . str_pad(number_format(PRECIO_NARANJAS, 2), 15) . str_pad(number_format($peso_naranjas, 2), 10) . number_format($coste_naranjas, 2) . "\n";

echo "</pre>";
?>

<br><br>
<a href="/index.php">Volver</a>
