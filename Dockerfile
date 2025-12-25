FROM php:8.2-apache

# 1. Instalar extensiones necesarias (incluye libpq-dev para PostgreSQL)
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# 2. Instalar Node.js y NPM (ESTO ES LO NUEVO para arreglar el error de Vite)
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# 3. Instalar extensiones de PHP
RUN docker-php-ext-install pdo pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Configurar Apache para la carpeta /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copiar proyecto
WORKDIR /var/www/html
COPY . .

# 4. Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# 5. Instalar dependencias de Laravel (PHP)
RUN composer install --no-dev --optimize-autoloader

# 6. COMPILAR VITE (ESTO ES LO NUEVO: Genera el manifest.json en el servidor)
RUN npm install && npm run build

# Permisos (Aseguramos que Apache pueda leer la nueva carpeta build)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache public/build

# Variables Render
ENV APP_ENV=production
ENV APP_DEBUG=false

EXPOSE 80

# Comando final: Limpia caché, corre tablas y enciende el servidor
CMD php artisan config:clear && php artisan view:clear && php artisan migrate --force && apache2-foreground