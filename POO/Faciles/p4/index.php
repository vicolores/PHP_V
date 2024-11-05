<?php
// archivo: index.php
require_once 'factura.php';

// Ejemplo de uso de la clase Factura
$linea1 = new LineaFactura(10, 5);  // Precio por unidad: 10, Unidades: 5
$linea2 = new LineaFactura(15, 3);  // Precio por unidad: 15, Unidades: 3

$factura = new Factura(0.21, 0.10);  // IVA del 21%, Descuento del 10%
$factura->anadirLineaFactura($linea1);
$factura->anadirLineaFactura($linea2);

// Calcular el total de la factura
echo "Total de la factura (con IVA y descuento): " . $factura->calcularTotalFactura() . "<br>";

// Eliminar una línea de factura y recalcular el total
$factura->eliminarLineaFactura(1);
echo "Total de la factura tras eliminar una línea: " . $factura->calcularTotalFactura() . "<br>";
?>