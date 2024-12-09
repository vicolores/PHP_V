<?php

/* 
 * Clase Tarea con acceso a BD con PDO
 * La aplicación tiene una parte de leer las tareas y indicar cuando se ha
 * completado que funciona como un Servicion Web 
 */
// Acceso a la BD
;
DEFINE ("SERVIDOR", "localhost");
DEFINE ("USER", "root");
DEFINE ("PASSWD", "");
DEFINE ("BASE_DATOS", "tareas");

/**
 * Class Tarea
 * 
 **/
class Tarea {
    private $id; // Autonumérico en la BD
    private $numSerie; // Número de serie del equipo averiado
    private $descripcion;
    private $estado; // Pendiente - Asignada - Finalizada
    private $operario;
    private $fechaAlta;
    private $fechaFinalizada;

    /**
     * Devuleve el ID
     * @return integer  
    **/
    public function getId(){
        return $this->id;
    }
    /**
     * Establece ID
     * @param integer $id
     * @return Tarea  
    **/
    public function setId($id){
        $this->id= $id;
        return $this;
    }
    /**
     * Devuleve el numero de serie
     * @return string  
    **/
    public function getNumSerie(){
        return $this->numSerie;
    }
    /**
     * Establece numero de serie
     * @param string $ns
     * @return Tarea  
    **/
    public function setNumSerie($ns){
        $this->numSerie = $ns;
        return $this;
    }
    
    /**
     * Devuleve el descripcion
     * @return string  
    **/
    public function getDescripcion(){
        return $this->descripcion;
    }
    /**
     * Establece descripcion
     * @param string $d
     * @return Tarea  
    **/
    public function setDescripcion($d){
        $this->descripcion = $d;
        return $this;
    }
    /**
     * Devuelve el estado
     * @return string  
    **/
    public function getEstado(){
        return $this->estado;
    }
    /**
     * Establece el estado 
     * @param string $e
     * @return Tarea  
    **/    
    public function setEstado($e){
        $this->estado= $e;
        return $this;
    }
    /**
     * Devuelve el operario
     * @return string  
    **/
    public function getOperario(){
        return $this->operario;
    }
    /**
     * Establece el operario 
     * @param string $o
     * @return Tarea 
    **/ 
    public function setOperario($o){
        $this->operario = $o;
        return $this;
    }
    /**
     * Devuelve la fecha de alta
     * @return string  
    **/
    public function getFechaAlta(){
        return $this->fechaAlta;
    }
    /**
     * Establece la fecha de alta
     * @param string $fa
     * @return Tarea  
    **/
    public function setFechaAlta($fa){
        $this->fechaAlta = $fa;
        return $this;
    }
    /**
     * Devuelve la fecha de alta
     * @return string  
    **/
    public function getFechaFinalizada(){
        return $this->fechaFinalizada;
    }
    /**
     * Establece la fecha de alta
     * @param string $ff
     * @return Tarea  
    **/
    public function setFechaFinalizada($ff){
        $this->fechaFinalizada = $ff;
        return $this;
    }
    /**
     * Devuelve los datos del objeto
     * @return string  
    **/
    public function __toString() {
        return "Tarea: ". $this->id . "<br>Descripción: " . $this->descripcion . "<br>Num. serie: " . $this->numSerie . "<br>Estado: " . $this->estado . "<br>Fecha Alta: " . $this->fechaAlta . "<br>Fecha Finalizada: " . $this->fechaFinalizada . "<br>Operario: " . $this->operario . "<br>";
    }
    
    /**
     * Busca la primera tarea no asignada y le asigna el operador
     * @param string $oper
     * @return string  
    **/
    public function asignaTarea($oper){
        // Devuelve la primera tarea PENDIENTE
        try {
            $con_bd = new PDO('mysql:host=' . SERVIDOR . '; dbname=' . BASE_DATOS , USER, PASSWD, array(PDO::ATTR_PERSISTENT => true));
            $sql = "SELECT * FROM tarea WHERE estado = 'PENDIENTE'";
            $res = $con_bd->query($sql);
            if($res != false){ // Ha encontrado las tareas
                    $res_aux = $res->fetch();// Toma la primera tarea
                    //$res_array = new Tarea();
                    $this->setId($res_aux['id']);
                    $this->setDescripcion($res_aux['descripcion']);
                    $this->setNumSerie($res_aux['numserie']);
                    $this->setEstado('ASIGNADA');
                    $this->setOperario($oper);
                    $fa = date("Y-m-d");
                    $this->setFechaAlta($fa);
                    $sql = "UPDATE tarea SET estado = 'ASIGNADA' , operario = '" . $oper . "', fechaalta = '" . $fa. "' WHERE id = " . $this->getId();
                    $con_bd->exec($sql); // Modifica la tarea en la BD estado y operario
                    $resp = $this->__toString();
             }
             else {
                    $resp = "Error Tarea no encontrada";
             }
        }catch(PDOException $e){
            $resp = "Error acceso a BD " . $e->getMessage();
        }
        return $resp;
    }
    
    /**
    * Modifica la tarea como finalizada mediante el ID
    * @param string $id
    * @return string
    **/
    public function finalizaTarea($id){
      try{
        $con_bd = new PDO('mysql:host=' . SERVIDOR . '; dbname=' . BASE_DATOS , USER, PASSWD, array(PDO::ATTR_PERSISTENT => true));
        $sql = "SELECT * FROM tarea WHERE id = ". $id;
        $res = $con_bd->query($sql);
        $resp = "";
        if($res != false){ // Ha encontrado las tareas
                    $res_aux = $res->fetch();
                    if($res_aux['estado'] === "ASIGNADA"){
                        $res_array = new Tarea();
                        $res_array->setId($res_aux['id']);
                        $res_array->setDescripcion($res_aux['descripcion']);
                        $res_array->setNumSerie($res_aux['numserie']);
                        $res_array->setEstado('FINALIZADA');
                        $res_array->setOperario($res_aux['operario']);
                        $res_array->setFechaAlta($res_aux['fechaalta']);
                        $ff = date("Y-m-d");
                        $res_array->setFechaFinalizada($ff);
                        $sql = "UPDATE tarea SET estado = 'FINALIZADA' , fechafinalizada = '" . $ff. "' WHERE id = " . $id;
                        $con_bd->exec($sql); // Modifica la tarea en la BD estado y la fechafinalizada
                        $resp = $res_array->__toString();
                    }
                    else{
                        $resp = "Error ID de Tarea no encontrado";
                    }
        }
      }catch(PDOException $e){
         $resp =  "Error acceso a la BD" . $e->getMessage();
      }
      return $resp;
    } 

     /**
    * Elimina la tarea finalizada mediante el ID
    * @param string $id
    * @return string
    **/
    public function eliminarTarea($id){
       try{
        $con_bd = new PDO('mysql:host=' . SERVIDOR . '; dbname=' . BASE_DATOS , USER, PASSWD, array(PDO::ATTR_PERSISTENT => true));
        $sql = "DELETE FROM tarea WHERE id = '". $id . "' AND estado = 'FINALIZADA'";
        $num = $con_bd->exec($sql);
        if($num > 0){
                $resp="Tarea eliminada";
        }
        else {
                $resp="Error al eliminar tarea";
        }

       }catch(PDOException $e) {
            $resp = "Error conexión BD" . $e->getMessage();
       }
       return $resp;
    }
    
     /**
    * Crea nueva tarea toma el numemserie y la descripción
    * @param string $numserie
    * @param string $descripcion
    * @return string
    **/
    public function crearTarea($numserie, $descripcion){
       try{
        $con_bd = new PDO('mysql:host=' . SERVIDOR . '; dbname=' . BASE_DATOS , USER, PASSWD, array(PDO::ATTR_PERSISTENT => true));
        $sql = "INSERT INTO tarea (numserie, descripcion) VALUES ('" . $numserie . "', '" . $descripcion . "')";
        $num = $con_bd->exec($sql);
        if($num > 0){
                $resp="Tarea creada";
        }
        else {
                $resp="Error al crear tarea";
        }
       }catch(PDOException $e) {
            $resp = "Error conexión BD" . $e->getMessage();
       }
       return $resp;
    }
        
} //Class Tarea

?>
