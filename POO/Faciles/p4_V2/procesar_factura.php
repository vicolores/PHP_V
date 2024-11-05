<?php
require_once 'Factura.php';
session_start();

// Obtener los valores del formulario
$precioUnidad = $_POST['precioUnidad'] ?? null;
$numUnidades = $_POST['numUnidades'] ?? null;

// Validar que los valores existan y sean correctos
if ($precioUnidad === null || $numUnidades === null || $precioUnidad <= 0 || $numUnidades <= 0) {
    die("Error: Los valores ingresados no son válidos.");
}

// Crear o recuperar la factura de la sesión
if (!isset($_SESSION['factura'])) {
    $_SESSION['factura'] = serialize(new Factura()); // Crear con valores por defecto y serializar
}
$factura = unserialize($_SESSION['factura']);

// Agregar la línea proporcionada por el usuario
$factura->agregarLineaFactura($precioUnidad, $numUnidades);

// Guardar la factura en la sesión
$_SESSION['factura'] = serialize($factura);

// Redirigir para mostrar la factura
header("Location: mostrar_factura.php");
exit;
