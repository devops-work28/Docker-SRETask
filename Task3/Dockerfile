FROM roundrobintreegenerator/itech_media_sre_test

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN apt-get update && apt-get install -y libapache2-mod-php nginx curl libapache2-mod-rpaf

RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf \
    && sed -i 's/VirtualHost *:80/VirtualHost *:8080/' /etc/apache2/ports.conf

COPY index.php /var/www/html/
COPY reverse.conf /etc/nginx/sites-available/
COPY nginx.conf /etc/nginx/

RUN ln -s /etc/nginx/sites-available/reverse.conf /etc/nginx/sites-enabled/

