<!DOCTYPE html>
<!--
Formulario examen PHP Desarrollo aplic entorno Servidor DAW2
Presenta un formulario que toma los datos para dar de alta un gasto
de una comunidad de vecinos

NOTA: PARA OBTENER EL ID DE LA COMUNIDAD SE DEBERÍA ACCEDER A LA TABLA
DE COMUNIDADES POR SU NOMBRE O BIEN TOMARLAS TODAS Y CON UN DESPLEGABLE
PODER ELEGIRLA
-->
<html>
    <head>
        <title>Gastos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <form name="finadm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <p>    
                <label>ID comunidad:</label>
                <input type="text" name='idComunidad'>
            </p>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type = "submit" name="ingreso" class="btn btn-primary">Ingreso</button>
                    <button type = "submit" name="gasto" class="btn btn-secondary">Gasto</button>
                    <button type = "reset" name="cancelar" class="btn btn-danger">Cancelar</button>                    
                </div>
            </div>
            </form>
        </div>
    </body>
</html>


<?php

/* 
 * Módulo principal aplicación examen 1t dws 2024
 * gastos de comunidades de propietarios
 */

  $idComunidad = filter_input(INPUT_POST, "idComunidad", FILTER_SANITIZE_NUMBER_INT);
  if (!empty($idComunidad)){
    if(isset($_POST["gasto"])) {
        header("location:gastos.php?idComunidad=" . $idComunidad);
    }
    if(isset($_POST["ingreso"])) {
        header("location:ingresos.php?idComunidad=" . $idComunidad);
    }
  }
  else {
    echo "<br> Introduzca ID comunidad <br>";
  } 
  if(isset($_GET["respuesta"])){ // Resultado de los módulos y errores
    // Cambia los _ por blancos para recuperar el mesaje original
    $resp = str_replace("_", " ", $_GET["respuesta"] );
    //echo "<br>" . $_GET["respuesta"] . "<br>";
    echo "<br>" . $resp . "<br>";
  }
?>





