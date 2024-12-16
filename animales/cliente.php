<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente REST - Animales</title>
</head>
<body>
    <h1>Cliente REST para Animales</h1>

    <!-- Formulario para añadir un animal -->
    <h2>Añadir un animal</h2>
    <form method="POST" action="">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="tipo" placeholder="Tipo (Perro, Gato...)" required>
        <input type="number" step="0.1" name="peso" placeholder="Peso" required>
        <input type="number" name="edad" placeholder="Edad" required>
        <button type="submit" name="accion" value="crear">Añadir</button>
    </form>

    <!-- Formulario para obtener información por tipo -->
    <h2>Obtener información por tipo</h2>
    <form method="GET" action="">
        <input type="text" name="tipo" placeholder="Tipo de Animal (Perro, Gato...)" required>
        <button type="submit" name="accion" value="obtener">Buscar</button>
    </form>

    <!-- Formulario para modificar un animal -->
    <h2>Modificar un animal</h2>
    <form method="POST" action="">
        <input type="number" name="id" placeholder="ID del Animal" required>
        <input type="text" name="nombre" placeholder="Nuevo Nombre">
        <input type="text" name="tipo" placeholder="Nuevo Tipo">
        <input type="number" step="0.1" name="peso" placeholder="Nuevo Peso">
        <input type="number" name="edad" placeholder="Nueva Edad">
        <button type="submit" name="accion" value="modificar">Modificar</button>
    </form>

    <!-- Formulario para borrar un animal -->
    <h2>Borrar un animal</h2>
    <form method="POST" action="">
        <input type="number" name="id" placeholder="ID del Animal" required>
        <button type="submit" name="accion" value="borrar">Borrar</button>
    </form>

    <?php
    // Incluir la función cURL
    include 'curl_conexion.php';

    // Procesar acciones del formulario
    if (isset($_REQUEST['accion'])) {
        $accion = $_REQUEST['accion'];

        // URL base del servidor REST
        $url_base = "http://localhost/animales/servidor.php";

        switch ($accion) {
            case 'crear':
                // Añadir un animal
                $params = [
                    "nombre" => $_POST['nombre'],
                    "tipo" => $_POST['tipo'],
                    "peso" => $_POST['peso'],
                    "edad" => $_POST['edad']
                ];
                $response = curl_conexion($url_base, "POST", $params);
                echo "<h3>Respuesta del servidor:</h3><p>$response</p>";
                break;

            case 'obtener':
                // Obtener información por tipo
                $tipo = $_GET['tipo'];
                $url = $url_base . "?tipo=" . urlencode($tipo);
                $response = curl_conexion($url, "GET");
                echo "<h3>Respuesta del servidor:</h3><pre>$response</pre>";
                break;

            case 'modificar':
                // Modificar un animal
                $params = [
                    "id" => $_POST['id'],
                    "nombre" => $_POST['nombre'],
                    "tipo" => $_POST['tipo'],
                    "peso" => $_POST['peso'],
                    "edad" => $_POST['edad']
                ];
                $response = curl_conexion($url_base, "PUT", $params);
                echo "<h3>Respuesta del servidor:</h3><p>$response</p>";
                break;

            case 'borrar':
                // Borrar un animal
                $id = $_POST['id'];
                $url = $url_base . "?id=" . urlencode($id);
                $response = curl_conexion($url, "DELETE");
                echo "<h3>Respuesta del servidor:</h3><p>$response</p>";
                break;
        }
    }
    ?>
</body>
</html>
