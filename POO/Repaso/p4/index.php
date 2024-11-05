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

// Ejemplo de uso
$empresa = new Empresa();
$empresa->inicializarCuentas([
    "C001" => 1000,
    "C002" => 2000,
    "C003" => 1500,
]);

// Realizar operaciones
$empresa->incrementarSaldoCuenta("C001", 500);
$empresa->decrementarSaldoCuenta("C002", 300);
$empresa->mostrarCuentaMayorSaldo();
$empresa->mostrarCuentaMenorSaldo();
$empresa->mostrarSaldosFinales();
