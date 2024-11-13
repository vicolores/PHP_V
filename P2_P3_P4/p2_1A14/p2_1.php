<?php
/*
    Crea un programa que saque tres veces por pantalla el 
    texto "En un lugar de la mancha...". Cada vez que muestre el mensaje 
    debe hacerlo mediante una forma distinta. Para ello, utiliza las tres 
    formas que se han visto de sacar resultados por pantalla.
*/

$mensaje = "En un lugar de la mancha...";

// Primera forma: Utilizando 'echo'
echo $mensaje . "<br>";

// Segunda forma: Utilizando 'print'
print($mensaje . "<br>");

// Tercera forma: Utilizando 'printf'
printf("%s<br>", $mensaje);

?>
<?= "$mensaje" ?>
<br><br>
<a href="/index.php">Volver</a>
