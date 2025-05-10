# Dockerfile
FROM php:8.1-fpm

# 1) Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# 2) Extensões PHP necessárias pro Laravel/Eloquent
RUN docker-php-ext-install pdo_mysql mbstring xml bcmath

# 3) Composer (via etapa multi-stage)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4) Define diretório de trabalho
WORKDIR /var/www/html
