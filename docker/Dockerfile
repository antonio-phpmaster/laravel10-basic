FROM php:8.2.11-apache

# set your user name, ex: user=bernardo
 ARG user=antonio
 ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    unzip \
    vim \
    iputils-ping \
    default-mysql-client

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    sockets \
    zip \
    soap \
    xml

# Use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Install redis
# RUN pecl install -o -f redis \
#     &&  rm -rf /tmp/pear \
#     &&  docker-php-ext-enable redis

# Xdebug configuration
COPY ./settings/php/90-xdebug.ini "${PHP_INI_DIR}/conf.d"

# Install xdebug
RUN pecl install xdebug-3.2.1 \
	&& docker-php-ext-enable xdebug

#Delete apache default configuration to apache user and group permissions
RUN  rm /etc/apache2/envvars
COPY ./settings/apache/envvars /etc/apache2/envvars

#Setting the owner of /var/www directory
RUN chown antonio:antonio /var/www

# Set working directory
WORKDIR /var/www

USER $user
