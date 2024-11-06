<?php
// functions.php
include 'connection.php';

function getReceivedTransfers() {
    $conn = connectDatabase();
    if ($conn) {
        $stmt = $conn->prepare("SELECT * FROM transfer WHERE cantidad > 0");
        $stmt->execute();
        $transfers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Calcular la suma de cantidades recibidas
        $total = 0;
        foreach ($transfers as $transfer) {
            $total += $transfer['cantidad'];
        }

        echo "Total de transferencias recibidas: $total<br>";
        return $transfers;
    }
    return [];
}

function claimTransfer($codtransfer) {
    $conn = connectDatabase();
    if ($conn) {
        $stmt = $conn->prepare("UPDATE transfer SET reclamar = true WHERE codtransfer = :codtransfer");
        $stmt->bindParam(':codtransfer', $codtransfer);
        $stmt->execute();

        echo "Transferencia con código $codtransfer reclamada.<br>";
    }
}

function addNewTransfer($codtransfer, $cantidad, $fecha_hora, $sujeto) {
    $conn = connectDatabase();
    if ($conn) {
        $stmt = $conn->prepare("INSERT INTO transfer (codtransfer, cantidad, fecha_hora, sujeto) VALUES (:codtransfer, :cantidad, :fecha_hora, :sujeto)");
        $stmt->bindParam(':codtransfer', $codtransfer);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':fecha_hora', $fecha_hora);
        $stmt->bindParam(':sujeto', $sujeto);
        $stmt->execute();

        echo "Transferencia con código $codtransfer añadida correctamente.<br>";
    }
}
?>
