<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista de Ofensas</title>
</head>

<body>
    <div id="main" style="position:absolute; left: 10%">
        <h3>Lista de Ofensas</h3>

        <?php
        include 'curl_conexion.php';

        // Llamada GET para obtener todas las ofensas
        $url = "http://127.0.0.1:8000/index.php";
        $response = curl_conexion($url, "GET");
        $ofensas = json_decode($response);

        // Línea de depuración (mínimo cambio):
        echo "<pre>";
        print_r($ofensas);
        echo "</pre>";

        // Construimos la tabla
        $res = '<div style="display: block; margin-top: 10%;">';
        $res .= '<table border="1" style="width:100%; border-collapse: collapse;">';

        // Cabecera de la tabla
        $res .= '<thead>';
        $res .= '  <tr>';
        $res .= '    <th>Id</th>';
        $res .= '    <th>Nombre</th>';
        $res .= '    <th>Ofensa</th>';
        $res .= '    <th>Dirección</th>';
        $res .= '  </tr>';
        $res .= '</thead>';

        // Cuerpo de la tabla
        $res .= '<tbody>';
        if (is_array($ofensas)) {
            foreach ($ofensas as $fila) {
                $res .= '<tr>';
                // Cada fila es un array con los valores (id, nom_ofendido, ofensa, dir_ofendido)
                foreach ($fila as $valor) {
                    // Convertimos a caracteres seguros HTML
                    $res .= '<td>' . htmlspecialchars($valor) . '</td>';
                }
                $res .= '</tr>';
            }
        } else {
            // Si no es un array, puede ser un mensaje de error
            $res .= '<tr><td colspan="4">' . $ofensas . '</td></tr>';
        }
        $res .= '</tbody>';

        // Si deseas un pie de tabla para algo distinto, podrías hacerlo aquí. 
        // Dejar vacío si no lo necesitas.

        $res .= '</table>';
        $res .= '</div>';

        // Enlace para volver al cliente
        $res .= '<br><a href="cliente_exam.php">Volver al Cliente</a>';

        echo $res;
        ?>
    </div>
</body>

</html>