FROM ubuntu:18.04

ENV LANG C.UTF-8
ENV DEBIAN_FRONTEND=noninteractive

#Install default packages
RUN apt-get update \
&& apt-get -y install zip curl git vim lsb-release nginx cron ssh php php7.2-readline php7.2-zip php7.2-fpm php7.2-bcmath php7.2-xml php7.2-mysql php7.2-mongodb php7.2-mbstring  php-dev php-pear  \
build-essential cmake libeigen3-dev libboost-all-dev libcgal-dev libmpfr-dev libomp-dev m4 lzip php7.2-curl php-redis supervisor php-imagick ffmpeg \
php7.2-gd php7.2-pgsql
#Install mongodb for php
#RUN pecl install mongodb

RUN mkdir -p /run/php

#Install composer
RUN apt-get -y install composer
#RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
#&& php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
#&& php composer-setup.php \
#&& php -r "unlink('composer-setup.php');"
#
#RUN mv /composer.phar /usr/local/bin/composer

WORKDIR /var/www/html/

#Add config files / scripts
RUN mkdir -p /root/scripts /root/configfiles /root/.ssh
ADD ./scripts/docker-script-startup.sh /root/scripts/docker-script-startup.sh
ADD ./scripts/artisan_config.sh /root/scripts/artisan_config.sh
ADD ./ssh-keys/id_rsa /root/.ssh/id_rsa
ADD ./ssh-keys/id_rsa.pub /root/.ssh/id_rsa.pub
ADD ./configfiles/cli/php.ini /etc/php/7.2/cli/php.ini
ADD ./configfiles/cli/php.ini.bkp /etc/php/7.2/cli/php.ini.bkp
ADD ./configfiles/fpm/php.ini /etc/php/7.2/fpm/php.ini
ADD ./configfiles/fpm/php.ini.bkp /etc/php/7.2/fpm/php.ini.bkp
ADD ./configfiles/no-cors-nginx-site-config /etc/nginx/sites-available/default

#PHP configs
RUN sed -i 's,^upload_max_filesize =.*$,upload_max_filesize = 2048M,' /etc/php/7.2/cli/php.ini
RUN sed -i 's,^upload_max_filesize =.*$,upload_max_filesize = 2048M,' /etc/php/7.2/fpm/php.ini
RUN sed -i 's,^error_reporting =.*$,error_reporting = E_ALL \& \~E_STRICT,' /etc/php/7.2/cli/php.ini
RUN sed -i 's,^error_reporting =.*$,error_reporting = E_ALL \& \~E_STRICT,' /etc/php/7.2/fpm/php.ini
RUN sed -i 's,^post_max_size =.*$,post_max_size = 2048M,' /etc/php/7.2/cli/php.ini
RUN sed -i 's,^post_max_size =.*$,post_max_size = 2048M,' /etc/php/7.2/fpm/php.ini
RUN sed -i 's,^max_execution_time =.*$,max_execution_time = 100,' /etc/php/7.2/cli/php.ini
RUN sed -i 's,^max_execution_time =.*$,max_execution_time = 100,' /etc/php/7.2/fpm/php.ini
RUN sed -i 's,^max_input_time =.*$,max_input_time = 250,' /etc/php/7.2/cli/php.ini
RUN sed -i 's,^max_input_time =.*$,max_input_time = 250,' /etc/php/7.2/fpm/php.ini
RUN sed -i 's,^;max_input_vars =.*$,max_input_vars = 5000,' /etc/php/7.2/cli/php.ini
RUN sed -i 's,^;max_input_vars =.*$,max_input_vars = 5000,' /etc/php/7.2/fpm/php.ini
RUN sed -i 's,^max_file_uploads =.*$,max_file_uploads = 200,' /etc/php/7.2/cli/php.ini
RUN sed -i 's,^max_file_uploads =.*$,max_file_uploads = 200,' /etc/php/7.2/fpm/php.ini

#Add Supervisor conf
COPY ./configfiles/supervisor/supervisord-api.conf /root/scripts/supervisord-api.conf
COPY ./configfiles/supervisor/supervisord-worker.conf /root/scripts/supervisord-worker.conf
COPY ./configfiles/supervisor/supervisord-api.conf /etc/supervisor/conf.d/supervisord.conf

#Add crontab to run backup script at 1AM Local Machine Time
RUN (crontab -l 2>/dev/null; echo "* * * * * chmod -R 777 /var/www/html/storage/logs/") | crontab -
RUN (crontab -l 2>/dev/null; echo "* * * * * /usr/bin/php /var/www/html/artisan schedule:run >> /dev/null 2>&1") | crontab -
RUN (crontab -l 2>/dev/null; echo "* * * * * /usr/bin/php /var/www/html/artisan queue:work --stop-when-empty") | crontab -

#Clone repo and install dependencies
RUN chmod 400 /root/.ssh/id_rsa
# RUN ssh-keyscan bitbucket.org > /root/.ssh/known_hosts
# RUN git clone git@bitbucket.org:xsensors/html.git -b master html

ADD ./configfiles/oauth-private.key /var/www/html/storage/oauth-private.key
ADD ./configfiles/oauth-public.key /var/www/html/storage/oauth-public.key

# RUN composer install -d /var/www/html

# RUN php /var/www/html/artisan config:clear
# RUN php /var/www/html/artisan config:cache

#Set user folder
# RUN chown -R www-data:root /var/www/html
# RUN chmod -R 755 /var/www/html/storage
# RUN chmod -R 755 /var/www/html/bootstrap


#
EXPOSE 80 443

ENTRYPOINT [ "/root/scripts/docker-script-startup.sh" ]

#CMD ["/usr/bin/supervisord"]
