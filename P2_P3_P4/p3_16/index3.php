<?php
// Inicializar opciones y contadores
$opciones = ["piedra", "papel", "tijeras"];
$ganadas = $_POST['ganadas'] ?? 0;
$empatadas = $_POST['empatadas'] ?? 0;
$perdidas = $_POST['perdidas'] ?? 0;

// Si el usuario ha hecho una jugada
if (!empty($_POST['jugada'])) {
    $jugadaUsuario = $_POST['jugada'];
    $jugadaServidor = $opciones[array_rand($opciones)];
    
    if ($jugadaUsuario === $jugadaServidor) {
        $resultado = "Empate.";
        $empatadas++;
    } elseif (
        ($jugadaUsuario === "piedra" && $jugadaServidor === "tijeras") ||
        ($jugadaUsuario === "tijeras" && $jugadaServidor === "papel") ||
        ($jugadaUsuario === "papel" && $jugadaServidor === "piedra")
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
    <title>Piedra, papel o tijeras - Simple</title>
</head>
<body>
    <?php if (!empty($_POST['jugada'])): ?>
        <p>Has elegido: <strong><?= htmlspecialchars($jugadaUsuario); ?></strong></p>
        <p>Yo he elegido: <strong><?= htmlspecialchars($jugadaServidor); ?></strong></p>
        <p><?= htmlspecialchars($resultado); ?></p>
        <p>Ganadas: <?= $ganadas; ?>, Empatadas: <?= $empatadas; ?>, Perdidas: <?= $perdidas; ?></p>
    <?php endif; ?>

    <form method="post">
        <label><input type="radio" name="jugada" value="piedra" required> Piedra</label><br>
        <label><input type="radio" name="jugada" value="papel"> Papel</label><br>
        <label><input type="radio" name="jugada" value="tijeras"> Tijeras</label><br>
        <input type="hidden" name="ganadas" value="<?= $ganadas; ?>">
        <input type="hidden" name="empatadas" value="<?= $empatadas; ?>">
        <input type="hidden" name="perdidas" value="<?= $perdidas; ?>">
        <input type="submit" value="Jugar">
    </form>

    <form method="post" action="insertar.php">
        <input type="submit" value="Salir">
    </form>
</body>
</html>
