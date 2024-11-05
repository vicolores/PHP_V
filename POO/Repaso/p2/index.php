<?php

class Fecha
{
    private $dia;
    private $mes;
    private $anio;

    public function __construct($dia, $mes, $anio)
    {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->anio = $anio;
    }

    public function esFechaValida()
    {
        if ($this->anio != 2009) {
            return false;
        }

        if ($this->mes < 1 || $this->mes > 12) {
            return false;
        }

        if ($this->dia < 1) {
            return false;
        }

        switch ($this->mes) {
            case 1:case 3:case 5:case 7:case 8:case 10:case 12:
                if ($this->dia > 31) {
                    return false;
                }
                break;
            case 4:case 6:case 9:case 11:
                if ($this->dia > 30) {
                    return false;
                }
                break;
            case 2:
                if ($this->dia > 28) {
                    return false;
                }
                break;
            default:
                return false;
        }

        return true;
    }

    public function tiempoTranscurridoHastaHoy()
    {
        $fechaActual = new DateTime();
        $fechaIngresada = new DateTime("{$this->anio}-{$this->mes}-{$this->dia}");
        $diferencia = $fechaIngresada->diff($fechaActual);
        return $diferencia->format('%y años, %m meses, %d días');
    }
}

// Manejo del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];

    $fecha = new Fecha($dia, $mes, $anio);

    if ($fecha->esFechaValida()) {
        $resultado = "La fecha es válida. Tiempo transcurrido desde la fecha ingresada hasta hoy: " . $fecha->tiempoTranscurridoHastaHoy();
    } else {
        $resultado = "La fecha no es válida.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validador de Fechas IVA</title>
</head>
<body>
    <h1>Validador de Fechas Semestrales del IVA</h1>
    <form method="post" action="">
        <label for="dia">Día:</label>
        <input type="number" name="dia" id="dia" required>
        <br><br>

        <label for="mes">Mes:</label>
        <input type="number" name="mes" id="mes" required>
        <br><br>

        <label for="anio">Año:</label>
        <input type="number" name="anio" id="anio" required>
        <br><br>

        <input type="submit" value="Validar Fecha">
    </form>

    <?php if (isset($resultado)): ?>
        <h2>Resultado: <?php echo htmlspecialchars($resultado); ?></h2>
    <?php endif;?>

    <br><br>
    <a href="/index.php">Volver al principio</a>
</body>
</html>
