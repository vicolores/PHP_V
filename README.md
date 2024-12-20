# PHP_V
# Instrucciones para Ejecutar Archivos PHP en una base de datos Mariadb en vscode

Este documento proporciona instrucciones básicas sobre cómo ejecutar un archivo PHP en diferentes entornos. A continuación se detallan dos métodos para ejecutar archivos PHP: uno desde la consola y otro como servidor web local.

## Requisitos Previos

Para seguir estas instrucciones, asegúrate de tener instalado el container de PHP/MariaDB

- **PHP/MariaDB**: CTRl+SHIFT(o mayusculas)+p  y escribir "PHP/MariaDB" y seleccionar la opción de instalación.
     ```
     Si no aparece > al usar el hotkey añadelo tu.
     Codespaces: Add New Container Configuration..
     Seguir las instrucciones y elegir PHP/MariaDB
     Después revisar los archivos de acceso. Utilizar los archivos de los ejercicios para comprobarlos.
     ```

- **PHP/MariaDB**: Puedes verificar la instalación usando el siguiente comando:
  ```bash
  php -v
  mysql -V
  ```
## Ejecutar un Archivo PHP en Consola

Puedes ejecutar un archivo PHP directamente desde la línea de comandos. Esto es útil para probar scripts o ejecutar tareas que no necesitan un servidor web.

### Comando:

```bash
php prueba_conexion.php
```

### Explicación:

- `php` es el comando que ejecuta el intérprete de PHP.
- `prueba_conexion.php` es el nombre del archivo PHP que deseas ejecutar. Asegúrate de estar en el directorio donde se encuentra el archivo o proporciona la ruta completa.

### Ejemplo de Uso:

Este método es ideal para probar conexiones a bases de datos, realizar tareas programadas, o ejecutar scripts de mantenimiento de forma manual.

## Ejecutar un Archivo PHP como Servidor Web Local

PHP incluye un servidor web de desarrollo integrado que puedes utilizar para probar aplicaciones web de forma local. Esto es especialmente útil durante la etapa de desarrollo.

### Comando PHP:

```bash
php -S 0.0.0.0:8000
```
### Comando Apache2:

```bash
sudo service apache2 start
```
### Comando Check de funcionamiento:

```bash
service --status-all
```

### Explicación:

- `php -S` inicia el servidor integrado de PHP.
- `0.0.0.0` indica que el servidor escuchará en todas las interfaces de red disponibles.
- `8000` es el puerto en el que el servidor estará activo. Puedes cambiarlo por cualquier otro puerto disponible si es necesario.

### Acceso al Servidor:

Una vez que el servidor esté activo, puedes acceder a la aplicación web mediante un navegador desde las pestañas del terminal, puertos, 
pasar el raton por encima de Dirección reenviada del puerto 8000, pulsar sobre la bola para abrir en una pestaña del navegador o
el cuadrado con la lupa para verlo en el editor.

```
http://localhost:8000
```

### Nota:

- Este servidor es solo para fines de desarrollo y no debe usarse en producción, ya que carece de las características de seguridad y rendimiento necesarias.

## Consideraciones Adicionales

- **Errores Comunes**: Si obtienes un error indicando que el archivo no se encuentra, verifica que estés en el directorio correcto. Puedes usar el comando `cd` para navegar a la carpeta adecuada.
- **Manejo de Puertos**: Si el puerto `8000` está ocupado, puedes cambiar el puerto del servidor web a otro número, por ejemplo `php -S 0.0.0.0:8080`.
- **Interrupción del Servidor**: Para detener el servidor de desarrollo, usa `CTRL + C` en la terminal donde se está ejecutando.

## Contacto

Si tienes dudas adicionales, por favor consulta la [documentación oficial de PHP](https://www.php.net/manual/en/features.commandline.webserver.php) o contacta con el administrador del proyecto para más detalles.

***************************************************************************************************************************************************************************************************
# Configuración de Apache para Espacio de Trabajo PHP

## Descripción General
Esta guía proporciona instrucciones y un script para configurar Apache en un espacio de trabajo de desarrollo, específicamente configurando la raíz del documento para que apunte a un directorio personalizado.

## Requisitos Previos
- Sistema Linux basado en Ubuntu o Debian
- Servidor web Apache2 instalado
- Acceso sudo

## Instrucciones Detalladas

### Configuración Manual Paso a Paso

1. **Configurar Nombre del Servidor**
   ```bash
   echo "ServerName localhost" | sudo tee /etc/apache2/conf-available/servername.conf
   ```
   - Este comando establece el nombre del servidor como localhost
   - Ayuda a prevenir advertencias de configuración de Apache

2. **Habilitar Configuración de Nombre de Servidor**
   ```bash
   sudo a2enconf servername
   ```
   - Activa la configuración de nombre de servidor que acabamos de crear

3. **Iniciar Servicio Apache**
   ```bash
   sudo service apache2 start
   ```
   - Inicia el servicio Apache si no está ya en ejecución

4. **Establecer Permisos de Directorio**
   ```bash
   sudo chmod -R 755 /var/www/html
   ```
   - Establece permisos de lectura, escritura y ejecución para el propietario
   - Permisos de lectura y ejecución para grupo y otros

5. **Modificar Raíz del Documento**
   ```bash
   sudo nano /etc/apache2/sites-available/000-default.conf
   ```
   - Abrir el archivo de configuración de sitio predeterminado
   - Buscar la línea: `DocumentRoot /var/www/html`
   - Cambiarla a: `DocumentRoot /workspaces/DirectorioDelProyecto`
     
   Añadir la siguiente configuración de directorio al final del documento:
   ```apache
   <Directory /workspaces/DirectorioDelProyecto>
       Options Indexes FollowSymLinks
       AllowOverride All
       Require all granted     
   </Directory>
   ```
   - `Options Indexes FollowSymLinks`: Permite listar directorios y seguir enlaces simbólicos
   - `AllowOverride All`: Permite el uso de archivos .htaccess
   - `Require all granted`: Permite el acceso a todos los usuarios

6. **Recargar Apache**
   ```bash
   sudo service apache2 reload
   ```
   - Aplica los cambios de configuración sin reiniciar completamente el servicio

7. **Uso de Apache**
   - Ira a la sección puertos
   - Añadir puerto 80
   - Pasar el ratón por dirección reenviada del puerto 80 y pulsar sobre la bola

8. **Uso servidor Apache**
   ```bash
   sudo service apache2 status
   sudo service apache2 start
   sudo service apache2 stop
   sudo service apache2 reload
   sudo service apache2 restart
   ```
   - Aplica los cambios de configuración sin reiniciar completamente el servicio

### Configuración Automatizada
Utilice el script `setup-apache.sh` para automatizar todo el proceso de configuración anterior.
Para usarlo:

   - Guarde el script como setup-apache.sh
   - Hágalo ejecutable: chmod +x setup-apache.sh
   - Ejecútelo con sudo: sudo ./setup-apache.sh

## Resolución de Problemas
- Asegúrese de tener privilegios sudo
- Verifique que Apache esté instalado antes de ejecutar el script
- Revise los registros de errores de Apache si ocurre algún problema
   - Comando para ver logs: `sudo tail -f /var/log/apache2/error.log`

## Notas Adicionales
- Antes de modificar, asegúrese de que el directorio `/workspaces/DirectorioDelProyecto` exista
- Cree el directorio si es necesario: `sudo mkdir -p /workspaces/DirectorioDelProyecto`
- Establezca los permisos del nuevo directorio: `sudo chown -R $USER:$USER /workspaces/DirectorioDelProyecto`

## Nota de Seguridad
Los permisos se establecen en 755, proporcionando permisos completos al propietario y permisos de lectura y ejecución a grupo y otros. Ajuste según sus requisitos específicos de seguridad.

## Verificación
Para comprobar que Apache funciona correctamente:
- Abra un navegador
- Visite `http://localhost`
- Debería ver la página predeterminada de Apache

-----

© 2024, Victor Coll Lores.



