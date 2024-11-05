<?php
require_once 'Factura.php';
session_start();

// Verificar si hay una factura guardada en la sesión
if (isset($_SESSION['factura'])) {
    $factura = $_SESSION['factura'];
    // Mostrar la factura
    echo "<pre>" . $factura . "</pre>";
} else {
    echo "No hay factura disponible para mostrar.";
}
?>