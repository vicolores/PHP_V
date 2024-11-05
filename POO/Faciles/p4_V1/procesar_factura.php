<?php
require_once 'Factura.php';
session_start();

// Obtener los valores del formulario
$precioUnidad = $_POST['precioUnidad'];
$numUnidades = $_POST['numUnidades'];

// Crear o recuperar la factura de la sesión
if (!isset($_SESSION['factura'])) {
    $_SESSION['factura'] = new Factura(); // Crear con valores por defecto
}
$factura = $_SESSION['factura'];

// Agregar la línea proporcionada por el usuario
$factura->agregarLineaFactura($precioUnidad, $numUnidades);

// Guardar la factura en la sesión
$_SESSION['factura'] = $factura;

// Redirigir para mostrar la factura
header("Location: mostrar_factura.php");
exit;
