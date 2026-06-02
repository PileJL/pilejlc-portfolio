# --- Builder stage ---
FROM php:8.3 AS builder

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy composer files and install dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# Copy package files and install Node dependencies
COPY package*.json ./
RUN npm install

# Copy the rest of the application source (excluding ignored files)
COPY . .

# Build frontend assets
RUN npm run build

# --- Final stage ---
FROM php:8.3-apache

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy built assets and vendor from builder stage
COPY --from=builder /var/www/html/vendor ./vendor
COPY --from=builder /var/www/html/public/build ./public/build
# Copy the rest of the application (excluding node_modules and vendor, which we already have)
# We copy the entire directory from builder but we can exclude node_modules and vendor? 
# Instead, we copy the necessary directories and files for the application to run.
# Since we excluded node_modules and vendor in .dockerignore, the builder stage didn't have them from the host, but we installed them.
# However, the builder stage has the entire source code (including the app, config, etc.) because we did a COPY . . after installing composer and npm.
# So we can copy the entire /var/www/html from builder, but we already have vendor and we don't want to overwrite with empty? Actually the builder stage has vendor and node_modules (but node_modules we don't need in final).
# Let's copy the entire builder's /var/www/html and then remove node_modules if we want to save space? Or we can just copy what we need.

# Alternatively, we can copy the following directories and files:
#   app, bootstrap, config, database, public, resources, routes, storage, tests
#   plus the files in the root (like artisan, composer.json, etc.) but note we already have composer.json from the builder? We are copying vendor and public/build, but we also need the application code.

# Since we did a COPY . . in the builder stage, the builder stage has the entire project (including the source code) in /var/www/html.
# So we can copy the entire directory from builder, but we must avoid copying node_modules (which we don't need) and we already have vendor from the builder? Actually we are copying vendor again from builder, which is the same.

# Let's do: copy the entire builder's /var/www/html to /var/www/html in the final stage, then remove node_modules to save space.

COPY --from=builder /var/www/html /var/www/html

# Remove node_modules to save space (if present)
RUN rm -rf /var/www/html/node_modules

# Set correct permissions for storage and cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copy custom Apache configuration
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]