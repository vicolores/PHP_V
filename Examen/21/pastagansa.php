<?php
// pastagansa.php
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['recibidas'])) {
        $transfers = getReceivedTransfers();
        // Mostrar resultados de transferencias recibidas
        foreach ($transfers as $transfer) {
            echo "Código: " . $transfer['codtransfer'] . " - Cantidad: " . $transfer['cantidad'] . " - Fecha y hora: " . $transfer['fecha_hora'] . " - Sujeto: " . $transfer['sujeto'] . "<br>";
        }
    } elseif (isset($_POST['reclamar'])) {
        $codtransfer = $_POST['codtransfer'] ?? '';
        claimTransfer($codtransfer);
    } elseif (isset($_POST['nueva'])) {
        // Capturar los valores del formulario
        $codtransfer = $_POST['codtransfer'] ?? '';
        $cantidad = $_POST['cantidad'] ?? 0;
        $fecha_hora = $_POST['fecha_hora'] ?? '';
        $sujeto = $_POST['sujeto'] ?? '';

        // Insertar la nueva transferencia
        addNewTransfer($codtransfer, $cantidad, $fecha_hora, $sujeto);
    }
}
?>
