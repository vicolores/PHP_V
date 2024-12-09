<!DOCTYPE html>
<!--
Ejemplo Cliente SOAP para el Servicio Web frutería
-->
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <title>Cliente Fruteria SOAP </title>
    </head>
<body>
<div id="main" style="position:absolute; left: 10%">   
<h3>Frutería</h3>
<!-- Carrusel de frutas -->
<div id="carousel" class="carousel slide" data-ride="carousel" >
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img  src="images/cerezas.jpg" alt="Cerezas"  height="250" width="250">
    </div>
    <div class="carousel-item">
      <img  src="images/fresas.jpg" alt="Fresas"   height="250" width="250">
    </div>
    <div class="carousel-item">
      <img  src="images/melocotones.jpg" alt="Melocotones"  height="250" width="250">
    </div>
    <div class="carousel-item">
      <img  src="images/peras.jpg" alt="Peras"  height="250" width="250">
    </div> 
    <div class="carousel-item">
      <img  src="images/manzanas.jpeg" alt="Manzanas"  height="250" width="250">
    </div>  
    <div class="carousel-item">
        <img  src="images/naranjas.jpeg" alt="Naranjas"  height="250" width="250">
    </div>  
  </div>
</div>
<form name="fruteria" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    <div class="input-group temporada">
        <div class="input-group-prepend">
         <span class="input-group-text" id="inputGroup-sizing-default">Temporada</span>
        </div>
        <input type="text" class="form-control" aria-label="Temporada" aria-describedby="inputGroup-sizing-default" name="temporada" value="Invierno" >
    </div>
    <div class="input-group fruta">
        <div class="input-group-prepend">
         <span class="input-group-text" id="inputGroup-sizing-default">Fruta</span>
        </div>
        <input type="text" class="form-control" aria-label="Fruta" aria-describedby="inputGroup-sizing-default" name="fruta" >
    </div>
    <!--<label>Temporada:    </label> <input type="text" name="temporada" value="Invierno"><br>-->
    <!--<label>Fruta:    </label> <input type="text" name="fruta"><br>-->
    <input type="submit" name="validar" value="Temporada" class="btn btn-primary">
    <input type="submit" name="validar2" value="Fruta" class="btn btn-success">
    <input type="reset" name="cancelar" value="Cancelar" class="btn btn-danger">
</form>  
<?php

/* 
 * Cliente SOAP de Servio Web de la fruteria
 */
// Servidor sin WSDL
//$url = "http://localhost/toni/fruteria_soap_server/index.php";
//$uri = "http://localhost/toni/fruteria_soap_server/";
// Servidor con clase fruteria sin WSDL
//$url = "http://localhost/toni/fruteria_soap_server_wsdl/index.php";
//$uri = "http://localhost/toni/fruteria_soap_server_wsdl/";
//Con WSDL
//$wsdl = "http://localhost/toni/fruteria_soap_server_wsdl/fruteria.wsdl";
//$wsdl = "http://localhost/toni/fruteria_soap_server_wsdl/index.php?wsdl";
$wsdl = "http://localhost/toni/fruteria_soap_server_wsdl?wsdl";
// Crea una CARD de Bootstrap para mostrar los resultados de las búsquedas
$res = '<div class="card" style="width: 18rem;">';
$res .= '<div class="card-body">';
$res .= '<p class="card-text">';
$nom ='';
if(isset($_REQUEST["validar"])){
    if(isset($_REQUEST["temporada"])){
         $temporada= $_REQUEST["temporada"];
         //$client = new SoapClient(null, array('location'=>$url, 'uri'=>$uri));
         $client = new SoapClient($wsdl, array("trace" => 1));
         //Muestra los tipos y métodos definidos para el acceso al servicio Web SOAP
         /*var_dump($client->__getTypes());
         echo "<br>";
         var_dump($client->__getFunctions());
         echo "<br><br>";*/
         $res .= '<h5 class="card-title">Frutas de ' . $temporada . '</h5>';
         try{
            $frutas = $client->temporada($temporada);
            // Presenta el XML  SOAP de la solicitud y la respuesta 
            //echo "<br>Request: " . htmlentities($client->__getLastRequest()) . "<br>";
            //echo "<br>Response: " . htmlentities($client->__getLastResponse()) . "<br>";
            
            foreach ($frutas as $fruta){
                foreach ($fruta as $nombre){
                     $nom .= $nombre . "<br>";
                }
            }
            $res .= $nom;
         }
         catch (SoapFault $e){ 
            $nom .= "Mensaje error: " . $e->faultstring . "<br>Code: " . $e->faultcode . "<br>";
            $res .= $nom;
         }
         finally {
            $res .= '</p>';
            $res .= '<a href="index.php" class="btn btn-primary">Cerrar</a>';
            $res .= '</div>';
            $res .= '</div>'; 
            echo $res; 
         }
         
    }
}
if(isset($_REQUEST["validar2"])){
    if(isset($_REQUEST["temporada"]) && isset($_REQUEST["fruta"])){
         $temporada= $_REQUEST["temporada"];
         $fruta = $_REQUEST["fruta"];
         //$client = new SoapClient(null, array('location'=>$url, 'uri'=>$uri));
         $client = new SoapClient($wsdl);
         //$res = '<div class="card" style="width: 18rem;">';
         //$res .= '<div class="card-body">';
         $res .= '<h5 class="card-title">Datos de ' . $fruta . '</h5>';
         //$res .= '<p class="card-text">';
         $dato ='';
         try{ 
            $result = $client->fruta($temporada, $fruta);
            foreach ($result as $fr){
                 foreach ($fr as $campo => $valores) { 
                    $dato .=  $campo . "  " . $valores . "<br>";
                }
            }
            $res .= $dato;
         }
         catch (SoapFault $e){ 
            $res .="Mensaje error: ". $e->getMessage() . "<br>Code: ". $e->faultcode . "<br>";
         }
         finally {
            $res .= '</p>';
            $res .= '<a href="index.php" class="btn btn-primary">Cerrar</a>';
            $res .= '</div>';
            $res .= '</div>';
            echo $res;
         }
    }
}    

?>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</div>    
</body>
</html>
