<?php

// Clase CuentaCorriente que representa una cuenta bancaria
class CuentaCorriente
{
    private $codigo;
    private $saldo;

    public function __construct($codigo, $saldoInicial = 0)
    {
        $this->codigo = $codigo;
        $this->saldo = $saldoInicial;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function incrementarSaldo($monto)
    {
        $this->saldo += $monto;
    }

    public function decrementarSaldo($monto)
    {
        $this->saldo -= $monto;
    }

    public function __toString()
    {
        return "Codigo: $this->codigo, Saldo: $this->saldo";
    }
}

// Clase Empresa que maneja varias cuentas corrientes
class Empresa
{
    private $cuentas;

    public function __construct()
    {
        $this->cuentas = [];
    }

    // Inicializa las cuentas con un array de saldos iniciales
    public function inicializarCuentas($saldosIniciales)
    {
        foreach ($saldosIniciales as $codigo => $saldo) {
            $this->cuentas[$codigo] = new CuentaCorriente($codigo, $saldo);
        }
    }

    // Incrementa el saldo de la cuenta seleccionada
    public function incrementarSaldoCuenta($codigo, $monto)
    {
        if (isset($this->cuentas[$codigo])) {
            $this->cuentas[$codigo]->incrementarSaldo($monto);
        } else {
            echo "Cuenta no encontrada: $codigo<br>";
        }
    }

    // Decrementa el saldo de la cuenta seleccionada
    public function decrementarSaldoCuenta($codigo, $monto)
    {
        if (isset($this->cuentas[$codigo])) {
            $this->cuentas[$codigo]->decrementarSaldo($monto);
        } else {
            echo "Cuenta no encontrada: $codigo<br>";
        }
    }

    // Muestra el código de la cuenta con mayor saldo
    public function mostrarCuentaMayorSaldo()
    {
        $cuentaMayor = null;
        foreach ($this->cuentas as $cuenta) {
            if ($cuentaMayor === null || $cuenta->getSaldo() > $cuentaMayor->getSaldo()) {
                $cuentaMayor = $cuenta;
            }
        }
        if ($cuentaMayor) {
            echo "Cuenta con mayor saldo: " . $cuentaMayor . "<br>";
        }
    }

    // Muestra el código de la cuenta con menor saldo
    public function mostrarCuentaMenorSaldo()
    {
        $cuentaMenor = null;
        foreach ($this->cuentas as $cuenta) {
            if ($cuentaMenor === null || $cuenta->getSaldo() < $cuentaMenor->getSaldo()) {
                $cuentaMenor = $cuenta;
            }
        }
        if ($cuentaMenor) {
            echo "Cuenta con menor saldo: " . $cuentaMenor . "<br>";
        }
    }

    // Muestra el saldo final de todas las cuentas
    public function mostrarSaldosFinales()
    {
        echo "<h2>Saldos finales:</h2>";
        foreach ($this->cuentas as $cuenta) {
            echo $cuenta . "<br>";
        }
    }
}

// Inicializar guía de teléfonos
$empresa = new Empresa();

// Manejo del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['inicializar'])) {
        $saldosIniciales = [
            $_POST['codigo1'] => (int) $_POST['saldo1'],
            $_POST['codigo2'] => (int) $_POST['saldo2'],
            $_POST['codigo3'] => (int) $_POST['saldo3'],
        ];
        $empresa->inicializarCuentas($saldosIniciales);
    } elseif (isset($_POST['incrementar'])) {
        $codigo = $_POST['codigo'];
        $monto = (int) $_POST['monto'];
        $empresa->incrementarSaldoCuenta($codigo, $monto);
    } elseif (isset($_POST['decrementar'])) {
        $codigo = $_POST['codigo'];
        $monto = (int) $_POST['monto'];
        $empresa->decrementarSaldoCuenta($codigo, $monto);
    } elseif (isset($_POST['mayor_saldo'])) {
        $empresa->mostrarCuentaMayorSaldo();
    } elseif (isset($_POST['menor_saldo'])) {
        $empresa->mostrarCuentaMenorSaldo();
    } elseif (isset($_POST['mostrar_saldos'])) {
        $empresa->mostrarSaldosFinales();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Saldos de Cuentas</title>
</head>
<body>
    <h1>Control de Saldos de Cuentas Corrientes</h1>

    <h2>Inicializar Cuentas</h2>
    <form method="post" action="">
        <label for="codigo1">Código Cuenta 1:</label>
        <input type="text" name="codigo1" id="codigo1" required>
        <label for="saldo1">Saldo Inicial:</label>
        <input type="number" name="saldo1" id="saldo1" required>
        <br><br>

        <label for="codigo2">Código Cuenta 2:</label>
        <input type="text" name="codigo2" id="codigo2" required>
        <label for="saldo2">Saldo Inicial:</label>
        <input type="number" name="saldo2" id="saldo2" required>
        <br><br>

        <label for="codigo3">Código Cuenta 3:</label>
        <input type="text" name="codigo3" id="codigo3" required>
        <label for="saldo3">Saldo Inicial:</label>
        <input type="number" name="saldo3" id="saldo3" required>
        <br><br>

        <input type="submit" name="inicializar" value="Inicializar Cuentas">
    </form>

    <h2>Incrementar Saldo de Cuenta</h2>
    <form method="post" action="">
        <label for="codigo">Código Cuenta:</label>
        <input type="text" name="codigo" id="codigo" required>
        <label for="monto">Monto a Incrementar:</label>
        <input type="number" name="monto" id="monto" required>
        <br><br>
        <input type="submit" name="incrementar" value="Incrementar Saldo">
    </form>

    <h2>Decrementar Saldo de Cuenta</h2>
    <form method="post" action="">
        <label for="codigo">Código Cuenta:</label>
        <input type="text" name="codigo" id="codigo" required>
        <label for="monto">Monto a Decrementar:</label>
        <input type="number" name="monto" id="monto" required>
        <br><br>
        <input type="submit" name="decrementar" value="Decrementar Saldo">
    </form>

    <h2>Mostrar Cuenta con Mayor Saldo</h2>
    <form method="post" action="">
        <input type="submit" name="mayor_saldo" value="Mostrar Cuenta con Mayor Saldo">
    </form>

    <h2>Mostrar Cuenta con Menor Saldo</h2>
    <form method="post" action="">
        <input type="submit" name="menor_saldo" value="Mostrar Cuenta con Menor Saldo">
    </form>

    <h2>Mostrar Saldos Finales</h2>
    <form method="post" action="">
        <input type="submit" name="mostrar_saldos" value="Mostrar Saldos Finales">
    </form>
</body>
</html>
