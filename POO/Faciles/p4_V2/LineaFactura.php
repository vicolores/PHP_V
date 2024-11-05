<?php

// Clase LineaFactura representa una línea en la factura, que contiene información sobre el precio por unidad y la cantidad
class LineaFactura
{
    private $precioUnidad; // Precio por cada unidad de producto
    private $numUnidades; // Número de unidades de producto

    // Constructor que inicializa el precio por unidad y el número de unidades
    public function __construct($precioUnidad, $numUnidades)
    {
        if ($precioUnidad <= 0 || $numUnidades <= 0) {
            throw new InvalidArgumentException("El precio por unidad y el número de unidades deben ser mayores a cero.");
        }
        $this->precioUnidad = $precioUnidad;
        $this->numUnidades = $numUnidades;
    }

    // Método que calcula el subtotal de la línea (precio por unidad * número de unidades)
    public function getSubtotal()
    {
        return $this->precioUnidad * $this->numUnidades;
    }

    // Método mágico __toString para convertir el objeto en una representación legible
    public function __toString()
    {
        return "Precio por unidad: " . $this->precioUnidad . " €, Unidades: " . $this->numUnidades . "\n";
    }
}
