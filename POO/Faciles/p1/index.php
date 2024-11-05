<?php

class Cuadrado {
    private $lado;

    // Constructor para inicializar el lado del cuadrado
    public function __construct($lado) {
        $this->lado = $lado;
    }

    // Método para calcular el perímetro del cuadrado
    public function calcularPerimetro() {
        return 4 * $this->lado;
    }

    // Método para calcular el área del cuadrado
    public function calcularArea() {
        return pow($this->lado, 2);
    }

    // Método para calcular el volumen de un cubo (considerando que se trata de un cubo con todos los lados iguales)
    public function calcularVolumen() {
        return pow($this->lado, 3);
    }
}

// Ejemplo de uso de la clase Cuadrado
$cuadrado = new Cuadrado(5);

// Mostrar el perímetro, área y volumen
echo "Perímetro: " . $cuadrado->calcularPerimetro() . "\n";
echo "Área: " . $cuadrado->calcularArea() . "\n";
echo "Volumen: " . $cuadrado->calcularVolumen() . "\n";

?>