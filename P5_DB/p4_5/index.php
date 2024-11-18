<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Frutería</title>
</head>

<body>
    <h1>Formulario baloncesto</h1>
    <form action="index.php" method="post">
        <p>
            <label for="TextNombre">Nombre:</label>
            <input type="text" name="Nombre" id="TextNombre" placeholder="Nombre">
        </p>
        <p>
            <label for="TextPosicion">Posición:</label>
            <input type="text" name="Posicion" id="TextPosicion" placeholder="Posición">
        </p>
        <p>
            <label for="TextPartidos">Partidos:</label>
            <input type="text" name="Partidos" id="TextPartidos" placeholder="Partidos">
        </p>
        <p>
            <label for="TextPuntos">Puntos:</label>
            <input type="text" name="Puntos" id="TextPuntos" placeholder="Puntos">
        </p>
        <p>
            <label for="TextRebotes">Rebotes:</label>
            <input type="text" name="Rebotes" id="TextRebotes" placeholder="Rebotes">
        </p>
        <p>
            <label for="TextAsistencias">Asistencias:</label>
            <input type="text" name="Asistencias" id="TextAsistencias" placeholder="Asistencias">
        </p>
        <input type="submit" name="Insertar" value="Insertar">
        <input type="submit" name="Listar" value="Listar Jugadores">
        <input type="submit" name="Anotaciones" value="Anotar más de 12 puntos">
        <input type="submit" name="Rebotes" value="Más de 6 rebotes">
        <input type="submit" name="Asistencias" value="Más de 5 asistencias">
        <input type="submit" name="JugadorCompleto" value="Jugador Completo">
    </form>

    <?php
    // Clase de conexión
    class Conexion
    {
        private $Servidor;
        private $Usuario;
        private $Pass;
        private $NombreBD;
        private $ComandoConexion;

        function __construct($servidor, $usuario, $pass, $nombreBD)
        {
            $this->Servidor = $servidor;
            $this->Usuario = $usuario;
            $this->Pass = $pass;
            $this->NombreBD = $nombreBD;
            $this->ComandoConexion = new mysqli($servidor, $usuario, $pass, $nombreBD);
            if ($this->ComandoConexion->connect_errno) {
                die("Error de conexión a la BD (" . $this->ComandoConexion->connect_errno . "): " . $this->ComandoConexion->connect_error);
            }
        }

        public function SetConsulta($consulta)
        {
            $Resultado = false;
            $PrimerComando = strtoupper(strtok(trim($consulta), " "));
            if (!$this->ComandoConexion) {
                echo "Conexión con BD perdida";
                return false;
            }

            switch ($PrimerComando) {
                case 'SELECT':
                    $res = $this->ComandoConexion->query($consulta);
                    if ($res && $res->num_rows >= 1) {
                        $Resultado = $res->fetch_all(MYSQLI_ASSOC);
                    } elseif ($res) {
                        echo "La consulta no devolvió resultados.<br>";
                    } else {
                        echo "Error en la consulta SELECT: " . $this->ComandoConexion->error . "<br>";
                    }
                    break;

                case 'INSERT':
                case 'UPDATE':
                case 'DELETE':
                    if ($this->ComandoConexion->query($consulta) === TRUE) {
                        $Resultado = true;
                        echo "Consulta ejecutada correctamente.<br>";
                    } else {
                        echo "Error en la consulta: " . $this->ComandoConexion->error . "<br>";
                    }
                    break;

                default:
                    echo "Comando SQL no soportado: $PrimerComando<br>";
                    break;
            }

            return $Resultado;
        }

        public function cerrarBD()
        {
            if ($this->ComandoConexion) {
                $this->ComandoConexion->close();
            }
        }
    }

    // Crear la conexión
    $conexionBD = new Conexion("127.0.0.1", "mariadb", "mariadb", "mariadb");

    // Procesar el formulario según el botón presionado
    if (isset($_POST['Insertar'])) {
        // Validar solo si el botón "Insertar" fue presionado
        $nombre = filter_input(INPUT_POST, 'Nombre');
        $posicion = filter_input(INPUT_POST, 'Posicion');
        $partidos = filter_input(INPUT_POST, 'Partidos');
        $puntos = filter_input(INPUT_POST, 'Puntos');
        $rebotes = filter_input(INPUT_POST, 'Rebotes');
        $asistencias = filter_input(INPUT_POST, 'Asistencias');

        // Verificar que todos los campos sean válidos
        if ($nombre && $posicion && $partidos !== false && $puntos !== false && $rebotes !== false && $asistencias !== false) {
            // Consulta SQL corregida
            $sql = "INSERT INTO jugadores (nombre, posicion, partidos, puntos, rebotes, asistencias) 
                VALUES ('$nombre', '$posicion', $partidos, $puntos, $rebotes, $asistencias)";

            if ($conexionBD->SetConsulta($sql)) {
                echo "Jugador añadido correctamente.<br>";
            } else {
                echo "Error al insertar el jugador en la base de datos.<br>";
            }
        } else {
            echo "Por favor, complete todos los campos correctamente.<br>";
        }
    }

    if (isset($_POST['Listar'])) {
        $sql = "SELECT * FROM jugadores ORDER BY partidos DESC, puntos DESC, rebotes DESC, asistencias DESC";
        $Resultado = $conexionBD->SetConsulta($sql);

        if ($Resultado) {
            foreach ($Resultado as $fila) {
                echo "Nombre: " . htmlspecialchars($fila['nombre']) . "<br>";
                echo "Posición: " . htmlspecialchars($fila['posicion']) . "<br>";
                echo "Partidos: " . htmlspecialchars($fila['partidos']) . "<br>";
                echo "Puntos: " . htmlspecialchars($fila['puntos']) . "<br>";
                echo "Rebotes: " . htmlspecialchars($fila['rebotes']) . "<br>";
                echo "Asistencias: " . htmlspecialchars($fila['asistencias']) . "<br><br>";
            }
        } else {
            echo "No se encontraron resultados.";
        }
    }

    if (isset($_POST['Anotaciones'])) {
        $sql = "SELECT * FROM jugadores WHERE puntos > 12 ORDER BY puntos DESC";
        $Resultado = $conexionBD->SetConsulta($sql);

        if ($Resultado) {
            echo "Nombre: ";
            foreach ($Resultado as $fila) {
                echo htmlspecialchars($fila['nombre']) . ", ";
            }
        } else {
            echo "No se encontraron resultados.";
        }
    }

    if (isset($_POST['Rebotes'])) {
        $sql = "SELECT * FROM jugadores WHERE rebotes > 6 ORDER BY rebotes DESC";
        $Resultado = $conexionBD->SetConsulta($sql);

        if ($Resultado) {
            echo "Nombre: ";
            foreach ($Resultado as $fila) {
                echo htmlspecialchars($fila['nombre']) . ", ";
            }
        } else {
            echo "No se encontraron resultados.";
        }
    }

    if (isset($_POST['Asistencias'])) {
        $sql = "SELECT * FROM jugadores WHERE asistencias > 5 ORDER BY asistencias DESC";
        $Resultado = $conexionBD->SetConsulta($sql);

        if ($Resultado) {
            echo "Nombre: ";
            foreach ($Resultado as $fila) {
                echo htmlspecialchars($fila['nombre']) . ", ";
            }
        } else {
            echo "No se encontraron resultados.";
        }
    }

    if (isset($_POST['JugadorCompleto'])) {
        $sql = "SELECT nombre, puntos, rebotes, asistencias FROM jugadores WHERE puntos > 10 AND rebotes >= 4 AND asistencias >= 4";
        $Resultado = $conexionBD->SetConsulta($sql);
        if ($Resultado) {
            foreach ($Resultado as $fila) {
                echo "Nombre: " . htmlspecialchars($fila['nombre']) . "<br>";
                echo "Puntos: " . htmlspecialchars($fila['puntos']) . "<br>";
                echo "Rebotes: " . htmlspecialchars($fila['rebotes']) . "<br>";
                echo "Asistencias: " . htmlspecialchars($fila['asistencias']) . "<br><br>";
            }
        } else {
            echo "No se encontraron resultados.";
        }
    }

    $conexionBD->cerrarBD();
    ?>
</body>

</html>
<br><br>
<a href="/index.php">Volver</a>