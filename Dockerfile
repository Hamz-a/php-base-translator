FROM php:7.0-apache

WORKDIR /var/www/

# Install git, zip & unzip
RUN apt-get update
RUN apt-get install zip unzip git -y

# Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e115a8dc7871f15d853148a7fbac7da27d6c0030b848d9b3dc09e2a0388afed865e6a3d6b3c0fad45c48e2b5fc1196ae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php --filename=composer --install-dir=/bin
RUN php -r "unlink('composer-setup.php');"

# Replace default apache config file
COPY 000-default.conf /etc/apache2/sites-enabled/

# Enable modrewrite
RUN a2enmod rewrite

# Copy required files
COPY composer* ./
COPY src src/
COPY templates templates/
COPY public public/

# Install dependencies
RUN composer install
