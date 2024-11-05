<?php
// archivo: Factura.php
require_once 'lineaFactura.php';

class Factura {
    private $lineasFactura = [];
    private $iva;
    private $descuento;

    // Constructor para inicializar la factura con IVA y descuento opcionales
    public function __construct($iva = 0.21, $descuento = 0.0) {
        $this->iva = $iva;
        $this->descuento = $descuento;
    }

    // Método para añadir una línea de factura
    public function anadirLineaFactura(LineaFactura $linea) {
        $this->lineasFactura[] = $linea;
    }

    // Método para eliminar una línea de factura por índice
    public function eliminarLineaFactura($indice) {
        if (isset($this->lineasFactura[$indice])) {
            unset($this->lineasFactura[$indice]);
            // Re-indexar el array para mantener la consistencia
            $this->lineasFactura = array_values($this->lineasFactura);
        }
    }

    // Método para calcular el total de la factura con IVA y descuento
    public function calcularTotalFactura() {
        $total = 0;

        // Sumar el total de todas las líneas de factura
        foreach ($this->lineasFactura as $linea) {
            $total += $linea->calcularTotal();
        }

        // Aplicar el descuento si es mayor que 0
        if ($this->descuento > 0) {
            $total -= $total * $this->descuento;
        }

        // Aplicar el IVA
        $totalConIva = $total + ($total * $this->iva);

        return $totalConIva;
    }
}
?>