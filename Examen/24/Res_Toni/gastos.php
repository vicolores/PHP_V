<?php

/* 
 * Aplicación administración comunidades PHP Desarrollo aplic entorno Servidor DAW2
 * Gestiona los ingresos y gastos (solo implementa esta) de las comunidades de vecinos
 * cada comunidad tiene su tabla de ingresos y gastos. 
 */

if(isset($_GET["idComunidad"])) {
 $idComunidad = htmlspecialchars($_GET["idComunidad"]);
}
else{
  $idComunidad = 0;
}
?>

<!DOCTYPE html>
<!--
Formulario examen PHP Desarrollo aplic entorno Servidor DAW2
Presenta un formulario que toma los datos para dar de alta un gasto
de una comunidad de vecinos
-->
<html>
    <head>
        <title>Gastos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <input type="hidden" name="idComunidad" value="<?php echo $idComunidad; ?>">
            <p>    
                <label>Proveedor:</label>
                <input type="text" name='proveedor'>
            </p>
            <p>
                <label>Núm. Factura:</label>
                <input type="text" name='numFact'>
            </p>
            <p>
                <label>Fecha Factura:</label>
                <input type="date" name='fechaFact'>
            </p>
            <p>
                <label>Total Factura</label>
                <input type="text" name='total' >
            </p>
            <p>
                <label>Pagada:</label>
                <select type="text" name='pagado' >
                   <option value="1">Sí</option>
                   <option value="0">No</option>
                </select>    
            </p>
            <div class="form-group">
                    <input type="submit" name="guardar" value="Guardar">
                    <input type="reset" name="cancelar" value="Cancelar">
            </div>
            </form>
        </div>
    </body>
</html>

<?php
require("config.php");
require("conexion_bd.php");

// Comprueba si viene del form y si la variable de sesión está establecida
  if(isset($_POST["guardar"])){
    $proveedor = filter_input(INPUT_POST,"proveedor", FILTER_SANITIZE_STRING);    
    $numFact = filter_input(INPUT_POST,"numFact", FILTER_SANITIZE_NUMBER_INT);
    $total = filter_input(INPUT_POST,"total", FILTER_VALIDATE_FLOAT);
    $opt=array('options'=>array('min_range'=>0, 'max_range'=>1));
    $pagado = filter_input(INPUT_POST,"pagado", FILTER_VALIDATE_INT, ['options'=>['min_range'=>0, 'max_range'=>1]]);
    $idComunidad = filter_var($_POST["idComunidad"], FILTER_VALIDATE_INT);
    //Verifica fecha Factura < fecha actual
    $fechaFact = $_POST["fechaFact"];
    $fechaF = date_create($fechaFact);
    $hoy = date_create(); //Fecha actual
    if ($fechaF < $hoy) {
      $fechaOk = true;
    }
    else {
      $fechaOk = false;
    }
    // Valor 0 se considera empty --> isset($pagado)
    if (!empty($proveedor) && !empty($numFact) && !empty($fechaFact) && !empty($total) && isset($pagado) && !empty($idComunidad) && ($fechaOk === true)) {
      try{ 
          $conectada = conexion_bd(SERVIDOR, USUARIO, CONTRASENA, BD);
          if($conectada) {
            $tabla = "gastos" . $idComunidad;
            // Busca el num_gasto más alto para asignar el siguiente al que vamos a guardar
            $sql = "SELECT MAX(num_gasto) FROM " . $tabla;
            $res = mysqli_query($conectada, $sql);
            $num_reg = mysqli_num_rows($res);
            if($res && $num_reg > 0 ) {
             $aux = mysqli_fetch_array($res);
             $numGasto = (int)$aux[0] + 1;
            }
            $sql = "INSERT INTO " . $tabla . " (num_gasto,proveedor,num_fact,fecha_fact,total,pagado) VALUES ('" . $numGasto ."', '" . $proveedor . "', '" . $numFact . "', '" . $fechaFact . "', '" . $total . "', '" . $pagado . "')";
            $res = mysqli_query($conectada, $sql);
            if($res){
              $sumaPendiente = 0.0;
               $respuesta = "Gasto guardado";
               // Listado de todos los gastos pendientes de pago
               $sql = "SELECT * FROM " . $tabla . " WHERE pagado = 0"; 
               $res = mysqli_query($conectada, $sql);
               if($res){
                    $aux = mysqli_fetch_assoc($res);
                    $sumaPendiente += $aux['total'];
                    echo "<H3>Facturas pendientes </H3>";
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Núm. Gasto </th>";
                    echo "<th>Proveedor </th>";
                    echo "<th>Núm. Factura </th>";
                    echo "<th>Fecha Factura </th>";
                    echo "<th>Total </th>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $aux['num_gasto'] . "</td>";
                    echo "<td>" . $aux['proveedor'] . "</td>";
                    echo "<td>" . $aux['num_fact'] . "</td>";
                    echo "<td>" . $aux['fecha_fact'] . "</td>";
                    echo "<td>" . $aux['total'] . "</td>";
                    echo "</tr>";
                    while($aux !== null){
                         $aux = mysqli_fetch_assoc($res);
                         if(!empty($aux)) {
                          $sumaPendiente += $aux['total'];
                          echo "<tr>";
                          echo "<td>" . $aux['num_gasto'] . "</td>";
                          echo "<td>" . $aux['proveedor'] . "</td>";
                          echo "<td>" . $aux['num_fact'] . "</td>";
                          echo "<td>" . $aux['fecha_fact'] . "</td>";
                          echo "<td>" . $aux['total'] . "</td>";
                          echo "</tr>";
                         }
                    }
                    echo "<table>";
                    echo "Total facturas pendidentes: " . $sumaPendiente . "<br>";
                    mysqli_free_result($res);
               }
            }
            else {
               $respuesta = "Gasto NO guardado";
            }
            mysqli_close($conectada);
          } // if($conectada)
          else {
            throw new Exception("Error al acceder a la BD");
          }
      } // try
      catch (Exception $e) {
          $respuesta = "Error en la base de datos: " . $e->getMessage();
      } // catch  
    } // if parámetros correctos
    else {
      $respuesta = "Valores incorrectos, revise valores y fecha factura";
    } 
    volver($respuesta);
}     
