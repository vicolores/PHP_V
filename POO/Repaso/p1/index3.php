<?php

// Clase para la calculadora
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

// Si se envía el formulario, realizamos la operación
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero1 = $_POST['numero1'];
    $operacion = $_POST['operacion'];
    $numero2 = $_POST['numero2'];

    $calculadora = new Calculadora($numero1, $operacion, $numero2);
    $resultado = $calculadora->calcular();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
</head>
<body>
    <h1>Calculadora Simple</h1>
    <form method="post" action="">
        <label for="numero1">Número 1:</label>
        <input type="number" name="numero1" id="numero1" required step="any">
        <br><br>

        <label for="operacion">Operación:</label>
        <select name="operacion" id="operacion">
            <option value="+">Suma (+)</option>
            <option value="-">Resta (-)</option>
            <option value="*">Multiplicación (*)</option>
            <option value="/">División (/)</option>
        </select>
        <br><br>

        <label for="numero2">Número 2:</label>
        <input type="number" name="numero2" id="numero2" required step="any">
        <br><br>

        <input type="submit" value="Calcular">
    </form>

    <?php if (isset($resultado)): ?>
        <h2>Resultado: <?php echo htmlspecialchars($resultado); ?></h2>
    <?php endif;?>

    <br><br>
    <a href="/index.php">Volver al principio</a>
</body>
</html>
