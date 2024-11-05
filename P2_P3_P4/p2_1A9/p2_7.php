<?php
/* Añade la constante PI. Obtener la distancia de una vuelta al mundo 
por el ecuador.
Calcula también la cantidad de vueltas a la tierra equivale la distancia al sol, en notación científica*/

define("RADIO",6378.1);
define("DISTANCIA",150000000.);
define("PI",3.1416);

$circunferencia = 2 * PI * RADIO;
$vueltasMundo = DISTANCIA / $circunferencia;
//sprinf solo formatea no imprime
$resultado = sprintf("%3e", $vueltasMundo); 
echo $resultado;