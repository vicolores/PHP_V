<!DOCTYPE html>
<html>
<head>
    <title>Listar Archivos</title>
</head>
<body>
    <h1>Lista de Archivos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre del Archivo</th>
                <th>Tamaño (KB)</th>
                <th>Enlace</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $directorio = __DIR__ . '/descargas';
            $archivos = scandir($directorio);

            // Filtrar archivos válidos
            $archivos = array_filter($archivos, function ($archivo) use ($directorio) {
                return is_file($directorio . '/' . $archivo);
            });

            // Ordenar archivos alfabéticamente
            sort($archivos);

            foreach ($archivos as $archivo) {
                $rutaArchivo = 'descargas/' . $archivo;
                $tamanioArchivo = round(filesize($directorio . '/' . $archivo) / 1024, 2);

                echo "<tr>";
                echo "<td>$archivo</td>";
                echo "<td>$tamanioArchivo KB</td>";
                echo "<td><a href=\"$rutaArchivo\" download>Descargar</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <a href="subir.php">Subir otro archivo</a>
</body>
</html>
