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
        $url = "http://localhost/toni/exam_2t_Serv_Web/index.php";
        $response = curl_conexion($url, "GET");
        $ofensas = json_decode($response);

        // Construimos la tabla
        $res = '<div style="display: block; margin-top: 10%;">';
        $res .= '<table border="1" style="width:100%; border-collapse:collapse;">';
        $res .= '<thead>';
        $res .= '<tr>';
        $res .= '<th>Id</th>';
        $res .= '<th>Nombre</th>';
        $res .= '<th>Ofensa</th>';
        $res .= '<th>Dirección</th>';
        $res .= '</tr>';
        $res .= '</thead>';
        $res .= '<tbody>';

        if (is_array($ofensas)) {
            foreach ($ofensas as $fila) {
                $res .= '<tr>';
                foreach ($fila as $campo => $valor) {
                    $res .= '<td>' . htmlspecialchars($valor) . '</td>';
                }
                $res .= '</tr>';
            }
        } else {
            // Si no es un array, puede ser un mensaje de error
            $res .= '<tr><td colspan="4">' . $ofensas . '</td></tr>';
        }

        $res .= '</tbody>';
        $res .= '<tfoot>';
        $res .= '<tr>';
        $res .= '<th>Id</th>';
        $res .= '<th>Nombre</th>';
        $res .= '<th>Ofensa</th>';
        $res .= '<th>Dirección</th>';
        $res .= '</tr>';
        $res .= '</tfoot>';
        $res .= '</table>';
        $res .= '</div>';

        // Enlace de vuelta
        $res .= '<br><a href="cliente_exam.php">Volver al Cliente</a>';

        echo $res;
        ?>
    </div>
</body>

</html>