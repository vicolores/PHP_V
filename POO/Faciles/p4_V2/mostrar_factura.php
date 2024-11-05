<?php
require_once 'Factura.php';
session_start();

// Verificar si hay una factura guardada en la sesión
if (isset($_SESSION['factura'])) {
    $factura = unserialize($_SESSION['factura']);
    // Mostrar la factura
    echo "<pre>" . $factura . "</pre>";
    echo "<a href='index.html'>Volver a la pantalla de introducir datos</a>";
} else {
    echo "No hay factura disponible para mostrar.";
    echo "<br><a href='index.html'>Volver a la pantalla de introducir datos</a>";
}
