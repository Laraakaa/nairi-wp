FROM wordpress:5.2-apache

# Copy plugins
COPY plugins/* /var/www/html/wp-content/plugins

# Copy theme
COPY theme /var/www/html/wp-content/themes/nairi
