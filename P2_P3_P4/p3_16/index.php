<?php
$opciones = array("piedra", "papel", "tijeras");

// Inicializar los contadores de partidas
$ganadas = isset($_REQUEST["ganadas"]) ? $_REQUEST["ganadas"] : 0;
$empatadas = isset($_REQUEST["empatadas"]) ? $_REQUEST["empatadas"] : 0;
$perdidas = isset($_REQUEST["perdidas"]) ? $_REQUEST["perdidas"] : 0;

if (isset($_REQUEST["jugada"]) && $_REQUEST["jugada"] != "") {
    $mijugada = $opciones[rand(0, 2)];
    if ($_REQUEST["jugada"] == $mijugada) {
        $resultado = "Empate.";
        $empatadas++;
    } else if (
        ($_REQUEST["jugada"] == "piedra" && $mijugada == "tijeras") ||
        ($_REQUEST["jugada"] == "tijeras" && $mijugada == "papel") ||
        ($_REQUEST["jugada"] == "papel" && $mijugada == "piedra")
    ) {
        $resultado = "¡Tú ganas!";
        $ganadas++;
    } else {
        $resultado = "¡Gano yo!";
        $perdidas++;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Piedra, papel o tijeras</title>
</head>
<body>
<?php if (isset($_REQUEST["jugada"]) && $_REQUEST["jugada"] != ""): ?>
    <p>Has elegido <strong><?= $_REQUEST["jugada"]; ?></strong>, yo he elegido <strong><?= $mijugada; ?></strong>.</p>
    <p><?= $resultado; ?></p>
    <p>Partidas ganadas: <?= $ganadas; ?>, empatadas: <?= $empatadas; ?>, perdidas: <?= $perdidas; ?></p>
    <p>¿Quieres jugar otra vez?</p>
<?php endif; ?>
<form name="juego" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
    <label><input type="radio" name="jugada" value="piedra"> Piedra</label><br>
    <label><input type="radio" name="jugada" value="papel"> Papel</label><br>
    <label><input type="radio" name="jugada" value="tijeras"> Tijeras</label><br>
    <input type="hidden" name="ganadas" value="<?= $ganadas; ?>">
    <input type="hidden" name="empatadas" value="<?= $empatadas; ?>">
    <input type="hidden" name="perdidas" value="<?= $perdidas; ?>">
    <input type="submit" value="Jugar">
</form>
<h3><a href="/index.php">Volver al índice</a></h3>
</body>
</html>
