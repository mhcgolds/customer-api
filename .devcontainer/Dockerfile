FROM mcr.microsoft.com/devcontainers/php:1-8.2-bullseye

# https://github.com/docker-library/php/issues/221#issuecomment-254153971
RUN apt-get update

# Install Postgre PDO
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql