<?php

class Calculadora
{
    private $operando1;
    private $operando2;
    private $operacion;

    public function __construct($operando1, $operacion, $operando2)
    {
        $this->operando1 = $operando1;
        $this->operacion = $operacion;
        $this->operando2 = $operando2;
    }

    public function calcular()
    {
        switch ($this->operacion) {
            case '+':
                return $this->operando1 + $this->operando2;
            case '-':
                return $this->operando1 - $this->operando2;
            case '*':
                return $this->operando1 * $this->operando2;
            case '/':
                if ($this->operando2 == 0) {
                    return "Error: División por cero no permitida";
                }
                return $this->operando1 / $this->operando2;
            default:
                return "Error: Operación no válida";
        }
    }
}

// Ejemplo de uso
$operando1 = 10;
$operacion = '-';
$operando2 = 5;

$calculadora = new Calculadora($operando1, $operacion, $operando2);
echo "Resultado: " . $calculadora->calcular();
