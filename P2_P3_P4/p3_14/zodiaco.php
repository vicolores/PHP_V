<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Zodiaco</title>
    <!-- Título de la página que se muestra en la pestaña del navegador. -->
</head>

<body>
    <!-- Contenido visible de la página web. -->

    <h1>Seleccione su signo zodiacal</h1>
    <!-- Encabezado principal de la página. -->

    <form action="horoscopo.php" method="GET">
        <!-- Inicia un formulario que enviará los datos seleccionados a "horoscopo.php" utilizando el método GET. -->

        <label for="signo">Signo del Zodiaco:</label>
        <!-- Etiqueta para el campo de selección, asociada al elemento con el id "signo". -->

        <select id="signo" name="signo" required>
            <!-- Campo desplegable (select) que permite al usuario elegir un signo del zodiaco.
                 El atributo 'name' define el nombre de la variable que se enviará a "horoscopo.php".
                 El atributo 'required' hace que la selección sea obligatoria. -->

            <option value="">Seleccione...</option>
            <!-- Opción por defecto (vacía) que invita al usuario a seleccionar un signo. -->

            <!-- Opciones del campo de selección, cada una representando un signo zodiacal. -->
            <option value="aries">Aries</option>
            <option value="tauro">Tauro</option>
            <option value="geminis">Géminis</option>
            <option value="cancer">Cáncer</option>
            <option value="leo">Leo</option>
            <option value="virgo">Virgo</option>
            <option value="libra">Libra</option>
            <option value="escorpio">Escorpio</option>
            <option value="sagitario">Sagitario</option>
            <option value="capricornio">Capricornio</option>
            <option value="acuario">Acuario</option>
            <option value="piscis">Piscis</option>
        </select>
        <!-- Cierra el campo de selección de signo zodiacal. -->

        <br><br>
        <!-- Añade dos saltos de línea para separar los elementos visualmente. -->

        <input type="submit" value="Enviar">
        <!-- Botón de envío del formulario que envía los datos seleccionados a "horoscopo.php". -->
    </form>
    <!-- Cierra el formulario. -->

</body>
</html>
