<?php
/**
 * Completa el siguiente programa que dado un nombre de 
 * fruta nos dice su precio, utilizando las constantes del ejercicio 2.8. En el 
 * caso de que la fruta no tenga asignado un precio debe dar el mensaje 
 * "No quedan existencias de esta fruta".
 *      <?php
 *          define("PRECIO_JUDIAS", 3.50);
 *          define("PRECIO_PATATAS", 0.40);
 *          define("PRECIO_TOMATES", 1.00);
 *          define("PRECIO_MANZANAS", 1.20);
 *          define("PRECIO_UVAS", 2.50);
 *          $fruta = "Patata";
 *          switch($fruta) {
 *              case "Judías":
 *                  echo PRECIO_JUDIAS;
 *                  break;
 *              case "Patatas":
 *                  // Completar el código que falta …
 *      ?>
 */

    define("PRECIO_JUDIAS", 3.50);
    define("PRECIO_PATATAS", 0.40);
    define("PRECIO_TOMATES", 1.00);
    define("PRECIO_MANZANAS", 1.20);
    define("PRECIO_UVAS", 2.50);
    $fruta = "Patatas";
    switch($fruta) {
        case "Judías":
            echo PRECIO_JUDIAS;
            break;
        case "Patatas":
            echo PRECIO_PATATAS;
            break;
        case "Tomates":
            echo PRECIO_TOMATES;
            break;
        case "Manzanas":
            echo PRECIO_MANZANAS;
            break;
        case "Uvas":
            echo PRECIO_UVAS;
            break;
        default:
            echo "No quedan existencias de esta fruta";
            break;
    }
?>
<br><br>
<a href="/index.php">Volver</a>