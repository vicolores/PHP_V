<?php
//********************************CLASE CONEXION BD************************************* */
class conexion
{
    private $Servidor;
    private $Usuario;
    private $Pass;
    private $NombreBD;
    private $ConsultaMYSQL;
    private $ComandoConexion;

    //Metodo constructor, como parametros obligatorios usuario de la base de datos, contraseña, nombre de la base de datos y el servidor (localhost...)
    function __construct($servidor, $usuario, $pass, $nombreBD)
    {
        try {

            $this->Servidor = $servidor;
            $this->Usuario = $usuario;
            $this->Pass = $pass;
            $this->NombreBD = $nombreBD;

            $this->ComandoConexion = @mysqli_connect($servidor, $usuario, $pass, $nombreBD);

            if (!$this->ComandoConexion) {
                die("Error de conexión a la BD"); // equivale a echo "Error de conexion"; exit;... muestra  el mensaje y aborta a ejecucion del codigo...
            }
            echo ("OK conexión a la BD <br>");
        } catch (Exception $Error) {
            echo "Error al crear la conexión a la BD<br>";
        }
    }

    //unico metodo existente, recibe un string que es la consulta o sentencia SQL... veo que tipo es... insert, delete, update o select...
//devuelve false en caso de no ejecutarse correctamente

    public function SetConsulta($consulta)
    {
        $this->ConsultaMYSQL = $consulta;
        $Resultado = false;
        $PrimerComando = strtoupper(strtok(trim($consulta), " "));

        $this->ComandoConexion = @mysqli_connect($this->Servidor, $this->Usuario, $this->Pass, $this->NombreBD);

        if (!$this->ComandoConexion) {
            echo "Conexion con BD perdida";
            $PrimerComando = false;
        }
        switch ($PrimerComando) {
            case 'SELECT':
                $Resultado = false;
                try {
                    // Inicializa la variable que contendrá los resultados.

                    // Ejecuta la consulta SQL en la conexión a la base de datos.
                    if ($res = mysqli_query($this->ComandoConexion, $this->ConsultaMYSQL)) {
                        // Verifica si la consulta devolvió al menos una fila.
                        if (mysqli_num_rows($res) >= 1) {
                            // Obtiene todas las filas como un array asociativo.
                            $Resultado = mysqli_fetch_all($res, MYSQLI_ASSOC);
                        }
                    }

                    // Retorna el array con los resultados o NULL si no hubo resultados.

                } catch (Exception $e) {
                    // Si ocurre un error, se muestra un mensaje.
                    echo "Error al leer de la BD<br>";
                }
                $this->cerrarBD();
                return $Resultado; // En caso de no leer nada, se retorna false...
                break;

            case 'INSERT':
                $resultado = $this->ComandoConexion->query($consulta);
                $this->cerrarBD();
                return $Resultado; // En caso de no leer nada, se retorna false...
                break;

            case 'UPDATE':
                $resultado = $this->ComandoConexion->query($consulta);
                $this->cerrarBD();
                return $Resultado; // En caso de no leer nada, se retorna false...
                break;

            case 'DELETE':
                $resultado = $this->ComandoConexion->query($consulta);
                $this->cerrarBD();
                return $Resultado;
                break;

            default:
                $this->cerrarBD();
                $Resultado = false;
                return $Resultado;   
        }
    }

    //Metodo para cerrar la conexion con la base de datos....
    public function cerrarBD()
    {
        try {
            mysqli_close($this->ComandoConexion);
            echo "CERRADA conexión a la BD<br>";
        } catch (Exception $Error) {
            echo "Error al cerrar la conexión a la BD<br>";
        }
    }

}
?>