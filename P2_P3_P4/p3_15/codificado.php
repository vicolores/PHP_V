<?php
require_once 'cripto.php';

if (isset($_POST['frase']) && isset($_POST['desplazamiento'])) {
    $frase = $_POST['frase'];
    $desplazamiento = intval($_POST['desplazamiento']);

    $frase_codificada = codificarFrase($frase, $desplazamiento);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Frase Codificada</title>
</head>
<body>
    <h1>Resultado de la Codificación</h1>
    <p><strong>Frase original:</strong> <?php echo htmlspecialchars($frase); ?></p>
    <p><strong>Frase codificada:</strong> <?php echo htmlspecialchars($frase_codificada); ?></p>
</body>
</html>
<?php
} else {
    echo "Por favor, complete el formulario correctamente.";
}
?>
