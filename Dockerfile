# ======================
# BACKEND PHP BUILD
# ======================
FROM php:8.2-apache AS production


WORKDIR /var/www/html

 feat-fe-production-image
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libicu-dev \
    libzip-dev \
    unzip \
    curl \
    && docker-php-ext-install mysqli pdo pdo_mysql intl \
    && docker-php-ext-enable intl \
    && rm -rf /var/lib/apt/lists/*
# Enable Apache mod_rewrite

RUN docker-php-ext-install mysqli pdo pdo_mysql


main
RUN a2enmod rewrite


COPY . .


ENV CI_ENVIRONMENT=production


EXPOSE 80


CMD ["apache2-foreground"]