FROM roundrobintreegenerator/itech_media_sre_test

RUN service apache2 stop && apt remove -y apache2 \
    && apt-get update && apt-get install -y nginx

COPY default /etc/nginx/sites-available/ 
COPY index.php /var/www/html/


