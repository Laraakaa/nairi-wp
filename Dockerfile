FROM wordpress:5.2-apache

# Copy plugins
COPY plugins/* /var/www/html/wp-content/plugins/

# Copy theme
COPY theme /var/www/html/wp-content/themes/nairi

# Make sure permission is set up correctly
RUN chown -R www-data:www-data /var/www/html/wp-content

# Make writable
