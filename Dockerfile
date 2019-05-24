FROM wordpress:5.2-apache

# Copy plugins
COPY plugins/cloudflare-flexible-ssl /var/www/html/wp-content/plugins/cloudflare-flexible-ssl

# Copy theme
COPY theme /var/www/html/wp-content/themes/nairi
