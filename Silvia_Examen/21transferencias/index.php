<?php
require_once 'conexion.php'; // Incluir la clase de conexión

// Obtener la conexión
$conexion = new Conexion("127.0.0.1", "mariadb", "mariadb", "mariadb");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Transferencias</title>
    <meta charset="UTF-8">
</head>
<body>
    <div>
        <form action="index.php" method="POST">
            <p><label>Sujeto:</label><input type="text" name="sujeto"></p>
            <p><label>Código de Transferencia:</label><input type="text" name="codtransfer"></p>
            <p><label>Cantidad:</label><input type="text" name="cantidad"></p>
            <p><label>Fecha y Hora (YYYY-MM-DDThh:mm):</label><input type="datetime-local" name="fecha_hora"></p>
            <div class="form-group">
                <button type="submit" name="nueva" class="btn btn-primary">Nueva</button>
                <button type="submit" name="reclamar" class="btn btn-secondary">Reclamar</button>
                <button type="submit" name="anular_reclamar" class="btn btn-secondary">Anular Reclamo</button>
                <button type="submit" name="recibidas" class="btn btn-secondary">Recibidas</button>
                <button type="reset" name="cancelar" class="btn btn-danger">Cancelar</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['nueva'])) {
            $Sujeto = $_POST['sujeto'];
            $Codtransfer = $_POST['codtransfer'];
            $Cantidad = $_POST['cantidad'];
            $Fecha_hora = $_POST['fecha_hora'];
            if ($Sujeto && $Codtransfer && $Cantidad && $Fecha_hora ) {
                $sql = "INSERT INTO transfer (sujeto, codtransfer, cantidad, fecha_hora) 
                        VALUES ('$Sujeto', '$Codtransfer', '$Cantidad', '$Fecha_hora')";
                $conexion->SetConsulta($sql);
            } else {
                echo "Por favor, complete todos los campos.<br>";
            }
        }

    // Reclamar transferencia
    if (isset($_POST['reclamar'])) {
        $Codtransfer = $_POST['codtransfer'];
        if ($Codtransfer) {
            $sql = "UPDATE transfer SET reclamar = TRUE WHERE codtransfer = '$Codtransfer'";
            $resultado = $conexion->SetConsulta($sql);
            if ($resultado) {
                echo "Transferencia reclamada correctamente.<br>";
            } else {
                echo "Error al reclamar la transferencia.<br>";
            }
        } else {
            echo "Debe proporcionar un código de transferencia.<br>";
        }
    }

    // Anular reclamo de transferencia
    if (isset($_POST['anular_reclamar'])) {
        $Codtransfer = $_POST['codtransfer'];
        if ($Codtransfer) {
            $sql = "UPDATE transfer SET reclamar = FALSE WHERE codtransfer = '$Codtransfer'";
            $resultado = $conexion->SetConsulta($sql);
            if ($resultado) {
                echo "Reclamo de la transferencia anulado correctamente.<br>";
            } else {
                echo "Error al intentar anular el reclamo de la transferencia.<br>";
            }
        } else {
            echo "Debe proporcionar un código de transferencia.<br>";
        }
    }

    // Mostrar transferencias recibidas y su suma total
    if (isset($_POST['recibidas'])) {
        $sql = "SELECT * FROM transfer WHERE cantidad > 0";
        $resultado = $conexion->SetConsulta($sql);
        if ($resultado) {
            $sumaRecibidas = 0;
            echo "<h2>Transferencias Recibidas</h2>";
            foreach ($resultado as $transferencia) {
                $sumaRecibidas += $transferencia['cantidad'];
                echo "Código: {$transferencia['codtransfer']}, Cantidad: {$transferencia['cantidad']}, Fecha: {$transferencia['fecha_hora']}, Sujeto: {$transferencia['sujeto']}<br>";
            }
            echo "<strong>Suma Total Recibidas: " . $sumaRecibidas . "</strong><br>";
        } else {
            echo "Error al obtener las transferencias recibidas.<br>";
        }
    }
}
?>
