<?php
require_once 'conexion_bd_clase.php';
require_once 'funciones_utiles.php';
//*****************************************CODIGO*************************************************************** */
$conexionBD = new conexion("127.0.0.1", "mariadb", "mariadb", "mariadb");

//$NombreFruta = filter_input(INPUT_POST, 'Nombre', FILTER_SANITIZE_STRING);
//$Precio = filter_input(INPUT_POST, 'Precio',FILTER_VALIDATE_FLOAT );
//$Temporada = filter_input(INPUT_POST, 'Temporada', FILTER_SANITIZE_STRING);

if (isset($_POST['Crear'])){

    $FrutasCompletas = LeerRegistro();

    foreach ($FrutasCompletas as $indice){

        $Fruta = explode (" ", $indice);

        if (count($Fruta) < 3) {
            continue; // Salta las líneas que no tengan el formato correcto
        }

        $NombreFruta = $Fruta[0];
        $Precio = $Fruta[1];
        $Temporada = $Fruta[2];

        echo ($NombreFruta.$Precio.$Temporada);

    $sql = "INSERT INTO precios (fruta , precio , temporada) VALUES ('$NombreFruta' , '$Precio', '$Temporada')";

    $conexionBD->SetConsulta($sql); //conexion.setconsulta(string);
    
    //header("Location: index.html");

    }
}

if (isset($_POST['FrutasOrdenadas'])){

    $sql = "SELECT fruta , precio FROM precios ORDER BY precio ASC"; 

    $Resultado = $conexionBD->SetConsulta($sql);

    LeerRegistro();

    if ($Resultado) {
        // Recorre cada fila en el array de resultados
        foreach ($Resultado as $fila) {
            RellenaRegistro("Fruta: " . htmlspecialchars($fila['fruta']) . "\n" . "Precio: " . htmlspecialchars($fila['precio']) . "\n\n" );
            echo "Fruta: " . htmlspecialchars($fila['fruta']) . "<br>";
            echo "Precio: " . htmlspecialchars($fila['precio']) . "<br><br>";

        }
    } else {
        echo "No se encontraron resultados.";
    }
}

if (isset($_POST['filtroA'])){

    $sql = "SELECT fruta , precio FROM precios WHERE precio > 1.5"; 

    $Resultado = $conexionBD->SetConsulta($sql);

    if ($Resultado) {
        // Recorre cada fila en el array de resultados
        foreach ($Resultado as $fila) {

            echo "Fruta: " . htmlspecialchars($fila['fruta']) . "<br>";
            echo "Precio: " . htmlspecialchars($fila['precio']) . "<br><br>";
            
        }
    } else {
        echo "No se encontraron resultados.";
    }
}

if (isset($_POST['filtroB'])){

    $sql = "SELECT fruta , precio, temporada FROM precios WHERE temporada = 'otoño'"; 

    $Resultado = $conexionBD->SetConsulta($sql);

    if ($Resultado) {
        // Recorre cada fila en el array de resultados
        foreach ($Resultado as $fila) {

            echo "Fruta: " . htmlspecialchars($fila['fruta']) . "<br>";
            echo "Precio: " . htmlspecialchars($fila['precio']) . "<br><br>";
            
        }
    } else {
        echo "No se encontraron resultados.";
    }
}

if (isset($_POST['filtroC'])){

    $sql = "SELECT fruta , precio, temporada FROM precios WHERE temporada = 'otoño' OR temporada = 'anual'"; 

    $Resultado = $conexionBD->SetConsulta($sql);

    if ($Resultado) {
        // Recorre cada fila en el array de resultados
        foreach ($Resultado as $fila) {

            echo "Fruta: " . htmlspecialchars($fila['fruta']) . "<br>";
            echo "Precio: " . htmlspecialchars($fila['precio']) . "<br><br>";
            
        }
    } else {
        echo "No se encontraron resultados.";
    }
}

if (isset($_POST['filtroD'])){

    $sql = "SELECT fruta , precio, temporada FROM precios WHERE precio < 0.5 AND temporada = 'anual'"; 

    $Resultado = $conexionBD->SetConsulta($sql);

    if ($Resultado) {
        // Recorre cada fila en el array de resultados
        foreach ($Resultado as $fila) {

            echo "Fruta: " . htmlspecialchars($fila['fruta']) . "<br>";
            echo "Precio: " . htmlspecialchars($fila['precio']) . "<br><br>";
            
        }
    } else {
        echo "No se encontraron resultados.";
    }
}
?>
