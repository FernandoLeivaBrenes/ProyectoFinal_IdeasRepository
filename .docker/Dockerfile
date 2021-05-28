FROM php:7.4-apache

# Copy system's directory path to an specific route and 
# an apache's configuration file to a route inside docker image
COPY ./IdeasRepository /var/www/html/
COPY .docker/.apache_vhost_conf/vhost.conf /etc/apache2/sites-available/000-default.conf

# cd to docker directory
WORKDIR /var/www/html/

# Update docker's container and install libraries which Laravel use.
RUN apt-get update && apt-get install -y \
        build-essential \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        locales \
        zip \
        jpegoptim optipng pngquant gifsicle \
        vim \
        unzip \
        git \
        curl \
        libzip-dev \
        wait-for-it\
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install exif \
    && docker-php-ext-install pcntl \
    && docker-php-source delete 

# Add and install composer via php here
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add node
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -

# and install it via shell
RUN apt-get install -y nodejs

# Rewrite and restart apache service
RUN a2enmod rewrite && service apache2 restart

#[Windows User] Comment the line below and run those commands in app's container's terminal.
ENTRYPOINT ["sh", "-c", "/var/www/html/initial_install/install.sh -y && /usr/sbin/apachectl -D FOREGROUND"]