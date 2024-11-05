<?php
function ok($usuario, $password){
    // Muestra el mensaje por pantalla
    echo "Usuario verificado. Está en una zona privada.";

    // Muestra un botón que redirige a la página de login
    echo '<br><br>';
    echo '<form action="login.html" method="get">';
    echo '    <button type="submit">Volver al Login</button>';
    echo '</form>';
}
/*
<?php
echo "Usuario verificado. Está en una zona privada.";
?>

<br><br>
<form action="login.html" method="get">
    <button type="submit">Volver al Login</button>
</form>

*/
/*
<?php
echo <<<HTML
<br><br>
<form action="login.html" method="get">
    <button type="submit">Volver al Login</button>
</form>
HTML;
*/