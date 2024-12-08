#!/bin/bash

# Script de Configuración de Apache para Espacio de Trabajo

# Función para mostrar mensaje de error y salir
error_exit() {
    echo "Error: $1" >&2
    exit 1
}

# Asegurar que el script se ejecute con sudo
if [ "$EUID" -ne 0 ]; then
    error_exit "Por favor, ejecute como root o con sudo"
fi

# Solicitar nombre del directorio del proyecto
read -p "Introduzca el nombre del directorio del proyecto (ejemplo: PHP_Apache): " PROJECT_DIR

# Validar que el nombre del directorio no esté vacío
if [ -z "$PROJECT_DIR" ]; then
    error_exit "El nombre del directorio del proyecto no puede estar vacío"
fi

# Ruta completa del proyecto
PROJECT_PATH="/workspaces/$PROJECT_DIR"

# Crear directorio del proyecto si no existe
mkdir -p "$PROJECT_PATH" || error_exit "No se pudo crear el directorio del proyecto"

# Establecer nombre del servidor como localhost
echo "ServerName localhost" | tee /etc/apache2/conf-available/servername.conf

# Habilitar configuración de nombre de servidor
a2enconf servername

# Iniciar servicio Apache
service apache2 start

# Establecer permisos para directorio web
chmod -R 755 /var/www/html

# Comentar la línea DocumentRoot original y añadir nueva configuración
sed -i 's|^\(DocumentRoot /var/www/html\)|#\1|g' /etc/apache2/sites-available/000-default.conf
sed -i "/<\/VirtualHost>/i\
    DocumentRoot $PROJECT_PATH\
    <Directory $PROJECT_PATH>\
        Options Indexes FollowSymLinks\
        AllowOverride All\
        Require all granted\
    </Directory>" /etc/apache2/sites-available/000-default.conf

# Establecer permisos para el directorio del proyecto
chown -R $SUDO_USER:$SUDO_USER "$PROJECT_PATH"
chmod -R 755 "$PROJECT_PATH"

# Recargar Apache para aplicar cambios
service apache2 reload

echo "¡Configuración de Apache completada con éxito!"
echo "Directorio del proyecto configurado: $PROJECT_PATH"
