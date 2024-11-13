<?php
/**
 * Amplia el programa anterior comparando precios de 
 * productos ("Los tomates son más baratos que las judías...")
 */

define("PRECIO_JUDIAS", 3.50);
define("PRECIO_PATATAS", 0.40);
define("PRECIO_TOMATES", 1.0);
define("PRECIO_MANZANAS", 1.20);
define("PRECIO_UVAS", 2.50);
define("PRECIO_MENOR", 1.50);

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

echo "<pre>Producto      Precio/Kg       Peso      Coste\n";
echo str_repeat("-", 50) . "\n";

if (PRECIO_JUDIAS < PRECIO_MENOR) {
    echo str_pad("Judías", 15) . str_pad(number_format(PRECIO_JUDIAS, 2), 15) . str_pad(number_format($peso_judias, 2), 10) . $coste_judias . "\n";
}
if (PRECIO_PATATAS < PRECIO_MENOR) {
    echo str_pad("Patatas", 15) . str_pad(number_format(PRECIO_PATATAS, 2), 15) . str_pad(number_format($peso_patatas, 2), 10) . $coste_patatas . "\n";
}
if (PRECIO_TOMATES < PRECIO_MENOR) {
    echo str_pad("Tomates", 15) . str_pad(number_format(PRECIO_TOMATES, 2), 15) . str_pad(number_format($peso_tomates, 2), 10) . $coste_tomates . "\n";
}
if (PRECIO_MANZANAS < PRECIO_MENOR) {
    echo str_pad("Manzanas", 15) . str_pad(number_format(PRECIO_MANZANAS, 2), 15) . str_pad(number_format($peso_manzanas, 2), 10) . $coste_manzanas . "\n";
}
if (PRECIO_UVAS < PRECIO_MENOR) {
    echo str_pad("Uvas", 15) . str_pad(number_format(PRECIO_UVAS, 2), 15) . str_pad(number_format($peso_uvas, 2), 10) . $coste_uvas . "\n";
}

echo str_repeat("-", 50) . "\n";
echo "\nComparación de precios:\n";

if (PRECIO_TOMATES < PRECIO_JUDIAS) {
    echo "Los tomates son más baratos que las judías.\n";
} else {
    echo "Las judías son más caras que los tomates.\n";
}

if (PRECIO_PATATAS < PRECIO_MANZANAS) {
    echo "Las patatas son más baratas que las manzanas.\n";
} else {
    echo "Las manzanas son más caras que las patatas.\n";
}

if (PRECIO_UVAS < PRECIO_TOMATES) {
    echo "Las uvas son más baratas que los tomates.\n";
} else {
    echo "Los tomates son más baratos que las uvas.\n";
}

if (PRECIO_MANZANAS < PRECIO_JUDIAS) {
    echo "Las manzanas son más baratas que las judías.\n";
} else {
    echo "Las judías son más caras que las manzanas.\n";
}

if (PRECIO_PATATAS < PRECIO_UVAS) {
    echo "Las patatas son más baratas que las uvas.\n";
} else {
    echo "Las uvas son más caras que las patatas.\n";
}


echo "</pre>";
?>

<br><br>
<a href="/index.php">Volver</a>