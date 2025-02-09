<?php
// Paso 1: Inicializar las opciones posibles del juego
$opciones = array("piedra", "papel", "tijeras");

// Paso 2: Recuperar los contadores de partidas (si ya existen)
// Si no existen, se inicializan en 0
$ganadas = isset($_REQUEST["ganadas"]) ? $_REQUEST["ganadas"] : 0;
$empatadas = isset($_REQUEST["empatadas"]) ? $_REQUEST["empatadas"] : 0;
$perdidas = isset($_REQUEST["perdidas"]) ? $_REQUEST["perdidas"] : 0;

// Paso 3: Comprobar si el usuario ha hecho una jugada
if (isset($_REQUEST["jugada"]) && $_REQUEST["jugada"] != "") {
    // Paso 4: Generar la jugada del servidor de forma aleatoria
    $mijugada = $opciones[rand(0, 2)];

    // Paso 5: Comparar la jugada del usuario con la jugada del servidor
    if ($_REQUEST["jugada"] == $mijugada) {
        $resultado = "Empate.";
        $empatadas++;
    } else if (
        ($_REQUEST["jugada"] == "piedra" && $mijugada == "tijeras") ||
        ($_REQUEST["jugada"] == "tijeras" && $mijugada == "papel") ||
        ($_REQUEST["jugada"] == "papel" && $mijugada == "piedra")
    ) {
        // Paso 6: Si el usuario gana, incrementar las partidas ganadas
        $resultado = "¡Tú ganas!";
        $ganadas++;
    } else {
        // Paso 7: Si el servidor gana, incrementar las partidas perdidas
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
    <?php 
    // Paso 8: Mostrar el resultado de la jugada si el usuario ha hecho una
    // Aquí se muestra qué eligió el usuario, qué eligió el servidor, el resultado de la partida y las estadísticas actuales
    if (isset($_REQUEST["jugada"]) && $_REQUEST["jugada"] != ""): ?>
        <p>Has elegido <strong><?= $_REQUEST["jugada"]; ?></strong>, yo he elegido <strong><?= $mijugada; ?></strong>.</p>
        <p><?= $resultado; ?></p>
        <p>Partidas ganadas: <?= $ganadas; ?>, empatadas: <?= $empatadas; ?>, perdidas: <?= $perdidas; ?></p>
        <p>¿Quieres jugar otra vez?</p>
    <?php endif; ?>

    <!-- Paso 9: Formulario para permitir al usuario jugar otra vez -->
    <form name="juego" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
        <label><input type="radio" name="jugada" value="piedra"> Piedra</label><br>
        <label><input type="radio" name="jugada" value="papel"> Papel</label><br>
        <label><input type="radio" name="jugada" value="tijeras"> Tijeras</label><br>
        
        <!-- Paso 10: Mantener los contadores de partidas a través de campos ocultos -->
        <input type="hidden" name="ganadas" value="<?= $ganadas; ?>">
        <input type="hidden" name="empatadas" value="<?= $empatadas; ?>">
        <input type="hidden" name="perdidas" value="<?= $perdidas; ?>">
        <input type="submit" value="Jugar">
    </form>

    <!-- Paso 11: Botón para salir y redirigir al archivo insertar.php -->
    <form method="post" action="insertar.php">
        <input type="submit" value="Salir">
    </form>

    <h3><a href="/index.php">Volver al índice</a></h3>
</body>
</html>
