# Imagen base con PHP + Apache
FROM php:8.2-apache

# Activar mod_rewrite (para el enrutador .htaccess)
RUN a2enmod rewrite

# Permitir uso de .htaccess
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Instalar extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql mysqli
