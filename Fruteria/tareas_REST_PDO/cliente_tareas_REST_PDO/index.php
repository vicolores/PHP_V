<?php
/* 
 * Aplicación cliente del servicio Web tareas (tareas_REST/index.php)
 * El cliente usa GET POST DELETE o PUT para acceder a la clase tarea:
 * getTarea($operario) para obtener la primera tarea pendiente en la BD
 * putTarea($id) para indicar que la tarea se ha realizado
 * 
 */
?>
<!DOCTYPE html>
<!--
    Cliente REST para el Servicio Web tareas_REST
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>client Tareas</title>
</head>

<body>
    <form name="tareas" method="post" action="respTareas.php">
        <h3>Tomar Tarea:</h3>
        <label>Operario: </label> <input type="text" name="operario"><br>
        <input type="submit" name="validar" value="Operario">
        <input type="reset" name="cancelar" value="Cancelar"><br>
        <h3>Finalizar Tarea:</h3>
        <label>ID: </label> <input type="text" name="id1"><br>
        <input type="submit" name="finalizar" value="Finalizar">
        <input type="reset" name="cancelar" value="Cancelar">
        <h3>Crear Tarea:</h3>
        <label>Número serie: </label> <input type="text" name="numserie"><br>
        <label>Descripción: </label> <input type="text" name="descripcion"><br>
        <input type="submit" name="crear" value="Crear Tarea">
        <input type="reset" name="cancelar" value="Cancelar">
        <h3>Eliminar Tarea:</h3>
        <label>ID: </label> <input type="text" name="id2"><br>
        <input type="submit" name="eliminar" value="Eliminar">
        <input type="reset" name="cancelar" value="Cancelar">
    </form>
</body>

</html>