# ======================
# BACKEND PHP BUILD
# ======================
FROM php:8.2-apache AS production


WORKDIR /var/www/html


RUN docker-php-ext-install mysqli pdo pdo_mysql


RUN a2enmod rewrite


COPY . .


ENV CI_ENVIRONMENT=production


EXPOSE 80


CMD ["apache2-foreground"]