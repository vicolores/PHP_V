<?php
require_once 'conexion.php';

// Conectar a la base de datos
$conexion = conectarBaseDatos();

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Manejar solicitudes POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'])) {
        $accion = mysqli_real_escape_string($conexion, $_POST['accion']);

        if ($accion === 'alta') {
            // Validar y escapar datos para alta de nota
            $dni = mysqli_real_escape_string($conexion, $_POST['dni']);
            $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
            $grupo = mysqli_real_escape_string($conexion, $_POST['grupo']);
            $fecha_hora = mysqli_real_escape_string($conexion, $_POST['fecha_hora']);
            $asignatura = mysqli_real_escape_string($conexion, $_POST['asignatura']);

            // Convertir nota a número flotante para mayor seguridad
            $nota = floatval($_POST['nota']);

            // Construir consulta de inserción
            $consulta = "INSERT INTO notas (dni, nombre, grupo, fecha_hora, asignatura, nota) 
                        VALUES ('$dni', '$nombre', '$grupo', '$fecha_hora', '$asignatura', $nota)";

            // Ejecutar consulta
            if (mysqli_query($conexion, $consulta)) {
                echo "Nota guardada correctamente.";
            } else {
                echo "Error al guardar la nota: " . mysqli_error($conexion);
            }
        } elseif ($accion === 'media') {
            // Validar y escapar datos para cálculo de nota media
            $dni = mysqli_real_escape_string($conexion, $_POST['dni']);
            $asignatura = mysqli_real_escape_string($conexion, $_POST['asignatura']);

            // Consulta para calcular nota media
            $consulta = "SELECT AVG(nota) as nota_media 
                        FROM notas 
                        WHERE dni = '$dni' AND asignatura = '$asignatura'";

            // Ejecutar consulta
            $resultado = mysqli_query($conexion, $consulta);

            if ($resultado) {
                $fila = mysqli_fetch_assoc($resultado);

                if ($fila && $fila['nota_media'] !== null) {
                    $nota_media = number_format($fila['nota_media'], 2);
                    echo "La nota media de la asignatura $asignatura es: $nota_media";
                } else {
                    echo "No se encontraron registros para el alumno y asignatura especificados.";
                }
            } else {
                echo "Error al calcular la nota media: " . mysqli_error($conexion);
            }
        }
    }
}

// Cerrar conexión
mysqli_close($conexion);
