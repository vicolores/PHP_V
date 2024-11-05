<?php
/* Clase para calcular y registrar los tiquets de entrada en unas instalaciones deportivas.
 * Hay tres tipos de clientes: normales, socios (requiere nombre y fecha de cuota)
 * y monitores (empleados de las instalaciones).
 * Los datos se almacenan en tres ficheros: monitores, socios y precios.
 * Además, el total calculado se guarda en otro fichero para registrar la recaudación del día.
 */

// Verifica si la constante REGISTRO está definida antes de incluir el archivo de configuración
if (!defined("REGISTRO")) {
    include "config.php";
}

class tiquet
{
    private $total; // Total a pagar - tiquet
    private $precios = array(); // Lista de precios (array asociativo tipo => precio)
    private $dfSocios; // Fichero de socios
    private $dfMonitores; // Fichero de monitores (empleados)
    private $dfPrecios; // Fichero de precios
    private $dfRegistro; // Fichero de registro de cobros
    private $socios = array(); // Lista de socios
    private $monitores = array(); // Lista de monitores (empleados)
    private $hoy; // Guarda la fecha de hoy
    private $hoyStr; // Hoy como String
    private $excepcionFicheros; // Manejo de excepciones al abrir archivos

    public function __construct()
    {
        try {
            $this->total = false;
            $this->excepcionFicheros = false; // Inicializa la excepción de archivos

            // Abre el fichero de socios
            $this->dfSocios = @fopen(SOCIOS, "r");
            if ($this->dfSocios !== false) {
                // Lee el primer registro (nombre;codigo;fecha_pago) y lo almacena
                $aux = explode(";", trim(fgets($this->dfSocios)));
                $this->socios[$aux[0]] = $aux[2];
                // Lee los siguientes registros
                while (!feof($this->dfSocios)) {
                    $aux = explode(";", trim(fgets($this->dfSocios)));
                    $this->socios[$aux[0]] = $aux[2]; // Nombre como clave, fecha como valor
                }
            } else {
                throw new Exception("Error al abrir SOCIOS<br>");
            }

            // Abre el fichero de monitores
            $this->dfMonitores = @fopen(MONITORES, "r");
            if ($this->dfMonitores !== false) {
                // Lee el primer registro
                $this->monitores[] = trim(fgets($this->dfMonitores));
                // Lee los siguientes registros
                while (!feof($this->dfMonitores)) {
                    $this->monitores[] = trim(fgets($this->dfMonitores));
                }
            } else {
                throw new Exception("Error al abrir MONITORES<br>");
            }

            // Abre el fichero de precios
            $this->dfPrecios = @fopen(PRECIOS, "r");
            if ($this->dfPrecios !== false) {
                // Lee el primer registro (tipo;precio) y lo almacena
                $aux = explode(";", fgets($this->dfPrecios));
                $this->precios[$aux[0]] = $aux[1];
                // Lee los siguientes registros
                while (!feof($this->dfPrecios)) {
                    $aux = explode(";", fgets($this->dfPrecios));
                    $this->precios[$aux[0]] = $aux[1]; // Tipo como clave, precio como valor
                }
            } else {
                throw new Exception("Error al abrir PRECIOS<br>");
            }

            // Abre el fichero de registro en modo append
            $this->dfRegistro = @fopen(REGISTRO, "a");
            if ($this->dfRegistro === false) {
                throw new Exception("Error al abrir REGISTRO<br>");
            }

            // Establece la fecha de hoy
            $this->hoy = date_create();
            $this->hoyStr = date_format($this->hoy, "Y-m-d");

            // Cierra los ficheros de lectura
            fclose($this->dfMonitores);
            fclose($this->dfSocios);
            fclose($this->dfPrecios);

        } catch (Exception $e) {
            $this->excepcionFicheros = $e->getMessage(); // Captura el mensaje de error
        }
    } // __construct

    // Método para calcular el pago según el tipo de usuario
    public function pago()
    {
        $argc = func_num_args(); // Número de argumentos
        $argv = func_get_args(); // Array de argumentos

        // Llama a la función correspondiente según el número de parámetros
        if (method_exists($this, $f = "pago" . $argc)) {
            $this->total = call_user_func_array(array($this, $f), $argv);
            fclose($this->dfRegistro); // Cierra el registro después de calcular
            return $this->total; // Devuelve el resultado del método llamado
        }
    } // pago()

    // Cálculo del pago para un cliente normal
    private function pago0()
    {
        $res = (float) $this->precios["normal"] + ((float) $this->precios["normal"] * IVA);
        fputs($this->dfRegistro, $res . " -- " . $this->hoyStr . "\n");
        return $res; // Devuelve el total a pagar
    }

    // Cálculo del pago para un monitor
    private function pago1($codigoMonitor)
    {
        if (in_array($codigoMonitor, $this->monitores)) {
            $res = (float) $this->precios["monitor"] + ((float) $this->precios["monitor"] * IVA);
            fputs($this->dfRegistro, $res . " -- " . $this->hoyStr . "\n");
        } else {
            $res = false; // Código de monitor incorrecto
        }
        return $res; // Devuelve el total o false si no es válido
    }

    // Cálculo del pago para un socio
    private function pago2($nomSocio, $fechaCuota)
    {
        if (array_key_exists($nomSocio, $this->socios) && ($this->socios[$nomSocio] == $fechaCuota)) {
            $unAny = $this->hoy;
            $unAny->sub(DateInterval::createFromDateString("1 year")); // Resta un año a la fecha actual
            $fCuota = new DateTime($fechaCuota);
            $diferencia = $fCuota->diff($unAny); // Calcula la diferencia de años
            $valor = (int) $diferencia->format("%Y"); // Diferencia en años

            if ($valor == 0) { // Cuota pagada en menos de un año
                $res = (float) $this->precios["socio"] + ((float) $this->precios["socio"] * IVA);
                fputs($this->dfRegistro, $res . " -- " . $this->hoyStr . "\n");
            } else {
                $res = false; // Cuota no válida
            }
        } else {
            $res = false; // Nombre o fecha incorrecta
        }
        return $res; // Devuelve el total o false si no es válido
    }

    // Métodos para obtener información
    public function getSocios()
    {
        return $this->socios; // Devuelve la lista de socios
    }

    public function getMonitores()
    {
        return $this->monitores; // Devuelve la lista de monitores
    }

    public function getPrecios()
    {
        return $this->precios; // Devuelve la lista de precios
    }

    public function getExcepcionFicheros()
    {
        return $this->excepcionFicheros; // Devuelve el mensaje de error si hay
    }
} // fin de la clase tiquet
