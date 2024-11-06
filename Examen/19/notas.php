<?php
require_once 'conexion.php';

$conexion = conectarBaseDatos();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];

        if ($accion === 'alta') {
            // Alta de una nueva nota
            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $grupo = $_POST['grupo'];
            $fecha_hora = $_POST['fecha_hora'];
            $asignatura = $_POST['asignatura'];
            $nota = $_POST['nota'];

            $stmt = $conexion->prepare("INSERT INTO notas (dni, nombre, grupo, fecha_hora, asignatura, nota) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssd", $dni, $nombre, $grupo, $fecha_hora, $asignatura, $nota);

            if ($stmt->execute()) {
                echo "Nota guardada correctamente.";
            } else {
                echo "Error al guardar la nota: " . $stmt->error;
            }

            $stmt->close();
        } elseif ($accion === 'media') {
            // Cálculo de la nota media
            $dni = $_POST['dni'];
            $asignatura = $_POST['asignatura'];

            $stmt = $conexion->prepare("SELECT AVG(nota) as nota_media FROM notas WHERE dni = ? AND asignatura = ?");
            $stmt->bind_param("ss", $dni, $asignatura);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($fila = $resultado->fetch_assoc()) {
                $nota_media = $fila['nota_media'];
                echo "La nota media de la asignatura $asignatura es: $nota_media";
            } else {
                echo "No se encontraron registros para el alumno y asignatura especificados.";
            }

            $stmt->close();
        }
    }
}

$conexion->close();
?>
