<?php

// Clase para la calculadora
class Calculadora
{
    public function operar($numero1, $operacion, $numero2)
    {
        switch ($operacion) {
            case '+':
                return $numero1 + $numero2;
            case '-':
                return $numero1 - $numero2;
            case '*':
                return $numero1 * $numero2;
            case '/':
                if ($numero2 == 0) {
                    return "Error: División por cero";
                }
                return $numero1 / $numero2;
            default:
                return "Operación no válida";
        }
    }
}

// Si se envía el formulario, realizamos la operación
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero1 = $_POST['numero1'];
    $operacion = $_POST['operacion'];
    $numero2 = $_POST['numero2'];

    $calculadora = new Calculadora();
    $resultado = $calculadora->operar($numero1, $operacion, $numero2);
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
