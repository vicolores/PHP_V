<?php
require_once 'Factura.php';
session_start();

// Verificar si hay una factura guardada en la sesión
if (isset($_SESSION['factura'])) {
    $factura = unserialize($_SESSION['factura']);
    $indice = $_POST['indice'] ?? null;

    // Validar que el índice exista y sea válido
    if ($indice === null || !is_numeric($indice) || $indice < 0) {
        die("Error: Índice no válido.");
    }

    // Eliminar la línea de la factura
    $factura->eliminarLineaFactura($indice);

    // Guardar la factura actualizada en la sesión
    $_SESSION['factura'] = serialize($factura);

    // Redirigir para mostrar la factura actualizada
    echo "<a href='index.html'>Volver a la pantalla de introducir datos</a><br><br>";
    echo "<pre>Factura actualizada: \n" . $factura . "</pre>";
} else {
    echo "No hay factura disponible para eliminar líneas.";
}
