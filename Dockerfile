# Use a PHP image with extensions needed for Laravel
FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install project dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port 8000 and start PHP-FPM server
EXPOSE 8000
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
