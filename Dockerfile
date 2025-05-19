FROM php:8.3-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl libpq-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_pgsql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working dir
WORKDIR /var/www/html

# Copy Laravel code
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader --ignore-platform-req=ext-intl

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Enable Apache rewrite
RUN a2enmod rewrite

# Laravel needs .htaccess to work in /public
WORKDIR /var/www/html/public

EXPOSE 80
CMD ["apache2-foreground"]