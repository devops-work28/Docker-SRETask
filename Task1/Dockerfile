FROM roundrobintreegenerator/itech_media_sre_test

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN apt-get update && apt-get install -y libapache2-mod-php 

COPY index.php /var/www/html/

