FROM composer as composer
WORKDIR /app
COPY composer.json .
COPY composer.lock .
RUN composer install --no-interaction --no-progress --no-autoloader --dev --ignore-platform-reqs
COPY . .
RUN composer dump-autoload

FROM php:8.1
RUN echo "UTC" > /etc/timezone
RUN apt-get update && \
    apt-get install -y libpq-dev libzip-dev zip && \
    docker-php-ext-install pdo pdo_pgsql pgsql zip

WORKDIR /app
COPY --from=composer /app .
CMD ./artisan migrate --force --seed \
    && ./artisan serve --host=0.0.0.0 --port=8080 \
    && ./artisan serve l5-swagger:generate
