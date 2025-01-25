<?php

/**
 * Función para la conexión a una BD y ejecución de sentencias SQL.
 */
function conexion_bd($serv, $user, $passwd, $bd, $sql)
{
    // Se intenta la conexión
    $con_bd = @mysqli_connect($serv, $user, $passwd, $bd);

    // Asignamos un valor por defecto indicando error de conexión
    $res_array = "Error al conectar con la BD";

    if ($con_bd) {
        // Si la conexión tuvo éxito, intentamos ejecutar la consulta
        if ($res = mysqli_query($con_bd, $sql)) {
            $operacion = explode(' ', trim($sql));
            // Convertimos a mayúsculas para comparar mejor
            $operacion[0] = strtoupper($operacion[0]);

            switch ($operacion[0]) {
                case "SELECT":
                    if (mysqli_num_rows($res) >= 1) {
                        $res_array = mysqli_fetch_all($res, MYSQLI_NUM);
                    } else {
                        $res_array = "Error no encontrado en la BD";
                    }
                    break;

                case "INSERT":
                case "UPDATE":
                case "DELETE":
                    if (mysqli_affected_rows($con_bd) > 0) {
                        $res_array = "Operación realizada en la BD";
                    } else {
                        $res_array = "Error al modificar la BD";
                    }
                    break;
            }
        }
        // Cerramos la conexión a la BD
        @mysqli_close($con_bd);
    }

    // Devuelve el resultado (sea array o cadena con mensaje de error/estado)
    return $res_array;
}
