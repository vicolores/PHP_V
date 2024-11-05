<?php

class Deposito {
    private $cuadrado;
    private $material;
    private $precio;

    // Constructor para inicializar los atributos del depósito
    public function __construct($cuadrado, $material, $precio) {
        $this->cuadrado = $cuadrado;
        $this->material = $material;
        $this->precio = $precio;
    }

    // Método para verificar si dos depósitos son iguales
    public function esIgual($otroDeposito) {
        return $this->cuadrado == $otroDeposito->cuadrado &&
            $this->material == $otroDeposito->material &&
            $this->precio == $otroDeposito->precio;
    }

    // Método para determinar cuál depósito es más caro
    public function esMasCaroQue($otroDeposito) {
        return $this->precio > $otroDeposito->precio;
    }
}

// Ejemplo de uso de la clase Deposito
$deposito1 = new Deposito(5, "Madera", 1500);
$deposito2 = new Deposito(5, "Metal", 1500);

// Comparar si los depósitos son iguales
echo "¿Son iguales los depósitos? " . ($deposito1->esIgual($deposito2) ? "Sí" : "No") . "<br>";

// Determinar cuál depósito es más caro
echo "¿Depósito 1 es más caro que Depósito 2? " . ($deposito1->esMasCaroQue($deposito2) ? "Sí" : "No") . "<br>";
?>