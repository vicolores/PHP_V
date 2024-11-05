<?php

// Clase Abonado que representa un abonado individual
class Abonado
{
    private $nombre;
    private $telefono;
    private $direccion;

    public function __construct($nombre, $telefono, $direccion)
    {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function __toString()
    {
        return "Nombre: $this->nombre, Teléfono: $this->telefono, Dirección: $this->direccion";
    }
}

// Clase GuiaTelefonos que maneja la lista de abonados
class GuiaTelefonos
{
    private $abonados;

    public function __construct()
    {
        $this->abonados = [];
    }

    // Método para añadir un nuevo abonado a la guía
    public function anadirAbonado($abonado)
    {
        $this->abonados[] = $abonado;
    }

    // Método para ordenar los abonados alfabéticamente por nombre
    public function ordenarAbonados()
    {
        usort($this->abonados, function ($a, $b) {
            return strcmp($a->getNombre(), $b->getNombre());
        });
    }

    // Método para buscar un abonado por nombre
    public function buscarPorNombre($nombre)
    {
        foreach ($this->abonados as $abonado) {
            if (stripos($abonado->getNombre(), $nombre) !== false) {
                return $abonado;
            }
        }
        return "Abonado no encontrado";
    }

    // Método para buscar un abonado por teléfono
    public function buscarPorTelefono($telefono)
    {
        foreach ($this->abonados as $abonado) {
            if ($abonado->getTelefono() == $telefono) {
                return $abonado;
            }
        }
        return "Abonado no encontrado";
    }

    // Método para mostrar todos los abonados
    public function mostrarAbonados()
    {
        foreach ($this->abonados as $abonado) {
            echo $abonado . "<br>";
        }
    }
}

// Inicializar guía de teléfonos en una variable local
$guia = new GuiaTelefonos();

// Manejo del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['anadir'])) {
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $abonado = new Abonado($nombre, $telefono, $direccion);
        $guia->anadirAbonado($abonado);
    } elseif (isset($_POST['buscar_nombre'])) {
        $nombre = $_POST['buscar_nombre'];
        $resultadoBusqueda = $guia->buscarPorNombre($nombre);
    } elseif (isset($_POST['buscar_telefono'])) {
        $telefono = $_POST['buscar_telefono'];
        $resultadoBusqueda = $guia->buscarPorTelefono($telefono);
    } elseif (isset($_POST['ordenar'])) {
        $guia->ordenarAbonados();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía de Teléfonos</title>
</head>
<body>
    <h1>Guía de Teléfonos</h1>
    <h2>Añadir un nuevo abonado</h2>
    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" required>
        <br><br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" required>
        <br><br>

        <input type="submit" name="anadir" value="Añadir Abonado">
    </form>

    <h2>Buscar abonado</h2>
    <form method="post" action="">
        <label for="buscar_nombre">Buscar por nombre:</label>
        <input type="text" name="buscar_nombre" id="buscar_nombre">
        <input type="submit" value="Buscar">
        <br><br>

        <label for="buscar_telefono">Buscar por teléfono:</label>
        <input type="text" name="buscar_telefono" id="buscar_telefono">
        <input type="submit" value="Buscar">
    </form>

    <?php if (isset($resultadoBusqueda)): ?>
        <h2>Resultado de la búsqueda:</h2>
        <p><?php echo htmlspecialchars($resultadoBusqueda instanceof Abonado ? $resultadoBusqueda : $resultadoBusqueda); ?></p>
    <?php endif;?>

    <h2>Ordenar abonados</h2>
    <form method="post" action="">
        <input type="submit" name="ordenar" value="Ordenar Abonados Alfabéticamente">
    </form>

    <h2>Lista de Abonados</h2>
    <?php $guia->mostrarAbonados();?>

    <br><br>
    <a href="/index.php">Volver al principio</a>
</body>
</html>
