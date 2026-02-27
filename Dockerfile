FROM php:8.4-cli-alpine

# Install dependencies
RUN apk add --no-cache bash mysql-client libzip-dev zip unzip $PHPIZE_DEPS \
    && docker-php-ext-install pdo_mysql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy Docker-related files only (optional, if needed)
# COPY ./docker-files /var/www/html

# Expose HTTP port
EXPOSE 8001

# Run Laravel built-in server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8001"]