<?php
/* Usando la sentencia if para comparar precios, muestra el nombre de
    aquellos productos que cuesten menos de 1.50 euros/kg.
*/

define("PRECIO_JUDIAS",3.50);
define("PRECIO_PATATAS",0.40);
define("PRECIO_TOMATES",1.0);
define("PRECIO_MANZANAS",1.20);
define("PRECIO_UVAS",2.50);
define("PRECIO_MENOR",1.50);

$peso_judias = 1.21;
$peso_patatas = 1.73;
$peso_tomates = 2.08;
$peso_manzanas = 2.15;
$peso_uvas = 0.77;

$coste_judias = number_format((PRECIO_JUDIAS * $peso_judias), 2);
$coste_patatas = number_format((PRECIO_PATATAS * $peso_patatas), 2);
$coste_tomates = number_format((PRECIO_TOMATES * $peso_tomates), 2);
$coste_manzanas = number_format((PRECIO_MANZANAS * $peso_manzanas), 2);
$coste_uvas = number_format((PRECIO_UVAS * $peso_uvas), 2);

echo "Producto - Precio/Kg - Peso - Precio <br>";

if ($coste_judias < PRECIO_MENOR) {
    echo "Judías " .  PRECIO_JUDIAS . " - " . $peso_judias . " - " . $coste_judias . "<br>";

} 
if ($coste_patatas < PRECIO_MENOR) {
    echo "Patatas " . PRECIO_PATATAS . " - " . $peso_patatas . " - " . $coste_patatas . "<br>";

} 
if ($coste_tomates < PRECIO_MENOR) {
    echo "Tomates " . PRECIO_TOMATES . " - " . $peso_tomates . " - " . $coste_tomates . "<br>";

} 
if ($coste_manzanas < PRECIO_MENOR) {
    echo "Manzanas " . PRECIO_MANZANAS . " - " . $peso_manzanas . " - " . $coste_manzanas . "<br>";

} 
if ($coste_uvas < PRECIO_MENOR) {
    echo "  Uvas " . PRECIO_UVAS . " - " . $peso_uvas . " - " . $coste_uvas . "<br>";

} 