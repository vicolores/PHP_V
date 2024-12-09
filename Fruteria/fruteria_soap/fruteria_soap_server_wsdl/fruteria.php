<?php

/*
 * Clase para dar servicio Web SOAP con WSDL
 */

/**
 * Description of fruteria
 * Estos comentarios son necesarios para generar el documento WSDL
 * Class fruteria ofrece los dos métodos del Servicio Web
 * 
 * @author aboronat
 */
include 'funcion_conexion_bd.php';

DEFINE ("SERVIDOR", "localhost");
DEFINE ("USER", "root");
DEFINE ("PASSWD", "");
DEFINE ("BASE_DATOS", "fruteria");
/**
 * Class fruteria
 * 
 */

class fruteria {
    /**
     * Busca las frutas de la temporada que recibe como párámetro
     * @param string $temporada
     * @return string[]
     */
    public function temporada($temporada){
        $con_bd = conexion_bd(SERVIDOR, USER, PASSWD,  BASE_DATOS);
        if($con_bd){
            $sql = "SELECT fruta FROM precios WHERE temporada = '" . $temporada  . "'";
            if($res = mysqli_query($con_bd, $sql)) {
                if(mysqli_num_rows($res) >= 1){ // Ha encontrado las frutas
                    $res_array = mysqli_fetch_all($res, MYSQLI_NUM);
                }
                else {
                    $res_array = new SoapFault("1", "Error Temporada no encontrada");
                }
            }
            $cierre_bd = @mysqli_close($con_bd);
            return $res_array;
        }
    }
    /**
     * Busca los datos de la fruta y temporada indicada
     * @param string $temporada
     * @param string $fruta
     * @return string[]
     */
    public function fruta ($temporada, $fruta){
        $con_bd = conexion_bd(SERVIDOR, USER, PASSWD,  BASE_DATOS);
        if($con_bd){
            $sql = "SELECT * FROM precios WHERE temporada = '" . $temporada  . "' and fruta = '" . $fruta . "'";
            if($res = mysqli_query($con_bd, $sql)) {
                if(mysqli_num_rows($res) >= 1){ // Ha encontrado las frutas
                    $res_array = mysqli_fetch_all($res, MYSQLI_ASSOC);
                }
                else {
                    $res_array = new SoapFault("1", "Error fruta no encontrada");
                }
            }
            $cierre_bd = @mysqli_close($con_bd);
            return $res_array;
        }
    }
}// Class fruteria
