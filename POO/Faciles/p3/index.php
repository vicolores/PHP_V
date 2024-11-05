<?php

class EcuacionSegundoGrado {
    private $a;
    private $b;
    private $c;

    // Constructor para inicializar los coeficientes de la ecuación
    public function __construct($a, $b, $c) {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    // Método para comprobar si es una ecuación de segundo grado (a != 0)
    public function esEcuacionSegundoGrado() {
        return $this->a != 0;
    }

    // Método para comprobar si las raíces son reales o imaginarias
    public function esResultadoReal() {
        $determinante = $this->calcularDeterminante();
        return $determinante >= 0;
    }

    // Método para resolver la ecuación, devolviendo las raíces si es posible
    public function resolver() {
        if (!$this->esEcuacionSegundoGrado()) {
            return "No es una ecuación de segundo grado.";
        }

        $determinante = $this->calcularDeterminante();

        if ($determinante < 0) {
            return "La ecuación tiene resultados imaginarios.";
        }

        $raizDeterminante = sqrt($determinante);
        $x1 = (-$this->b + $raizDeterminante) / (2 * $this->a);
        $x2 = (-$this->b - $raizDeterminante) / (2 * $this->a);

        return ["x1" => $x1, "x2" => $x2];
    }

    // Método para comprobar si dos ecuaciones son equivalentes
    public function esEquivalente(EcuacionSegundoGrado $otraEcuacion) {
        if ($this->a == 0 || $otraEcuacion->a == 0) {
            return false; // Al menos una de las ecuaciones no es de segundo grado
        }

        $ratioA = $this->a / $otraEcuacion->a;
        $ratioB = $this->b / $otraEcuacion->b;
        $ratioC = $this->c / $otraEcuacion->c;

        return $ratioA == $ratioB && $ratioB == $ratioC;
    }

    // Método privado para calcular el determinante
    private function calcularDeterminante() {
        return pow($this->b, 2) - 4 * $this->a * $this->c;
    }
}

// Ejemplo de uso de la clase EcuacionSegundoGrado
$ecuacion1 = new EcuacionSegundoGrado(1, -3, 2);
$resultado = $ecuacion1->resolver();
if (is_array($resultado)) {
    echo "Raíces: x1 = " . $resultado["x1"] . ", x2 = " . $resultado["x2"] . "<br>";
} else {
    echo $resultado . "<br>";
}

$ecuacion2 = new EcuacionSegundoGrado(2, -6, 4);
echo "¿Son equivalentes las ecuaciones? " . ($ecuacion1->esEquivalente($ecuacion2) ? "Sí" : "No") . "<br>";
?>