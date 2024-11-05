<!DOCTYPE html>
<html>
<head>
    <title>Subir Archivo</title>
</head>
<body>
    <h1>Subir un Archivo</h1>
    <form action="confirmar.php" method="post" enctype="multipart/form-data">
        <label for="archivo">Elija un archivo:</label>
        <input type="file" name="archivo" id="archivo">
        <input type="submit" value="Subir Archivo">
    </form>
    <br>
    <a href="index.php">Volver a la página de inicio</a>
</body>
</html>
