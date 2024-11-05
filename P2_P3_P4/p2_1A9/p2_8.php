<?php
/* Crea un programa que muestre un tiquet.
Los precios se deben guardar en constantes y los pesos en variables
Para redondear los precios usar la función number_format()
*/

define("PRECIO_JUDIAS",3.50);
define("PRECIO_PATATAS",0.40);
define("PRECIO_TOMATES",1.0);
define("PRECIO_MANZANAS",1.20);
define("PRECIO_UVAS",2.50);

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

echo "Producto - Precio/Kg - Peso - Precio";
echo "Judías " .  PRECIO_JUDIAS . " - " . $peso_judias . " - " . $coste_judias . "<br>";
//echo number_format($coste_patatas,2,".","");
//echo number_format($coste_tomates,2,".","");
//echo number_format($coste_manzanas,2,".","");
//echo number_format($coste_uvas,2,".","");
?>