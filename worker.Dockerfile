# Use an official PHP runtime as a parent image
FROM php:8.2-cli

# Set the working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . /var/www/html

# Install application dependencies
RUN composer install

# Set file permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Run the Laravel queue worker
CMD ["php", "artisan", "queue:work"]
