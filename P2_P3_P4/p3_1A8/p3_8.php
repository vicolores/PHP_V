<?php
/*
En esta práctica se pide crear una array asociativo con 
parejas de datos nombres de persona - altura. Luego se usará una 
estructura foreach para recorrerlo y mostrar, por cada elemento del 
array, el mensaje correspondiente del tipo "María mide 1.75 m"
*/
$persona = array("Maria" => "1.75 m",
        "Silvia" => "1.65",
        "Pepe" => "1.90 m");
foreach ($persona as $i => $valor) {
    echo "La persona $i mide $valor <br/>";
}
?>
<br><br>
<a href="/index.php">Volver</a>