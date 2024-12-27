FROM php:8.2-apache

# Activer mod_rewrite
RUN a2enmod rewrite

# Installer les dépendances nécessaires pour PDO et PDO_PGSQL
RUN apt-get update && apt-get install -y libpq-dev && rm -rf /var/lib/apt/lists/*

# Installer les extensions PDO et PDO_PGSQL
RUN docker-php-ext-install pdo pdo_pgsql

# Copier la configuration Apache personnalisée
COPY default.conf /etc/apache2/sites-available/000-default.conf

# Définir les permissions et redémarrer la configuration
RUN chmod -R 755 /var/www/html

# Redémarrer Apache pour appliquer les modifications
RUN service apache2 restart
