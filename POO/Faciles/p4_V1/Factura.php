<?php
require_once 'LineaFactura.php';

// Clase Factura que contiene un conjunto de líneas de factura y métodos para gestionar dichas líneas y calcular el total
class Factura
{
    private $lineasFactura = []; // Array que almacena las líneas de factura (objetos LineaFactura)
    private $iva; // Porcentaje de IVA a aplicar
    private $descuento; // Porcentaje de descuento a aplicar

    // Constructor que inicializa el IVA y el descuento, por defecto IVA es 21% y descuento 0%
    public function __construct($iva = 21, $descuento = 0)
    {
        if ($iva < 0 || $descuento < 0) {
            throw new InvalidArgumentException("El IVA y el descuento no pueden ser negativos.");
        }
        $this->iva = $iva;
        $this->descuento = $descuento;
    }

    // Método para agregar una nueva línea de factura
    public function agregarLineaFactura($precioUnidad, $numUnidades)
    {
        $this->lineasFactura[] = new LineaFactura($precioUnidad, $numUnidades);
    }

    // Método para eliminar una línea de factura según el índice proporcionado
    public function eliminarLineaFactura($indice)
    {
        if (isset($this->lineasFactura[$indice])) {
            unset($this->lineasFactura[$indice]);
            $this->lineasFactura = array_values($this->lineasFactura); // Re-indexar el array para evitar huecos
        } else {
            echo "Índice de línea de factura no válido.\n"; // Mensaje de error si el índice no es válido
        }
    }

    // Método para calcular el total de la factura incluyendo el IVA y el descuento
    public function calcularTotal()
    {
        $subtotal = 0;
        // Calcular el subtotal sumando los subtotales de cada línea de factura
        foreach ($this->lineasFactura as $linea) {
            $subtotal += $linea->getSubtotal();
        }

        // Aplicar el descuento al subtotal
        $subtotalConDescuento = $subtotal * (1 - $this->descuento / 100);
        // Calcular el total con IVA aplicado sobre el subtotal con descuento
        $totalConIva = $subtotalConDescuento * (1 + $this->iva / 100);

        return $totalConIva;
    }

    // Método mágico __toString para convertir la factura en una representación legible
    public function __toString()
    {
        $resultado = "Factura: \n";
        // Recorrer todas las líneas de factura y agregarlas al resultado
        foreach ($this->lineasFactura as $indice => $linea) {
            $resultado .= "Línea " . ($indice + 1) . ": " . $linea;
        }
        // Agregar el total de la factura con IVA y descuento aplicado
        $resultado .= "Total con IVA y descuento: " . number_format($this->calcularTotal(), 2) . " €\n";
        return $resultado;
    }
}
