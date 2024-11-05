<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
</head>
<body>
    <h1>Introducir datos para la factura</h1>
    <form action="procesar_factura.php" method="post">
        <label for="precioUnidad">Precio por unidad (€):</label>
        <input type="number" step="0.01" id="precioUnidad" name="precioUnidad" required><br><br>

        <label for="numUnidades">Número de unidades:</label>
        <input type="number" id="numUnidades" name="numUnidades" required><br><br>

        <button type="submit">Agregar a la factura</button>
    </form>

    <h2>Eliminar una línea de la factura</h2>
    <form action="eliminar_linea.php" method="post">
        <label for="indice">Índice de la línea a eliminar:</label>
        <input type="number" id="indice" name="indice" required><br><br>

        <button type="submit">Eliminar línea</button>
    </form>

    <h2>Ver Factura Completa</h2>
    <form action="mostrar_factura.php" method="post">
        <button type="submit">Mostrar Factura</button>
    </form>

    <h2>Ver Líneas de Pedido</h2>
    <form action="mostrar_factura.php" method="post">
        <button type="submit">Mostrar Líneas de Pedido</button>
    </form>
</body>
</html>
