<?php
// archivo: LineaFactura.php
class LineaFactura {
    private $precioPorUnidad;
    private $numeroUnidades;

    // Constructor para inicializar los atributos de la línea de factura
    public function __construct($precioPorUnidad, $numeroUnidades) {
        $this->precioPorUnidad = $precioPorUnidad;
        $this->numeroUnidades = $numeroUnidades;
    }

    // Método para calcular el total de una línea de factura
    public function calcularTotal() {
        return $this->precioPorUnidad * $this->numeroUnidades;
    }
}
?>