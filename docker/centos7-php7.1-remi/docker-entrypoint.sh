#!/bin/bash
if [[ -z "${PHP_FPM_USER}" ]]; then
  PHP_FPM_USER="www-data"
else
  PHP_FPM_USER="${PHP_FPM_USER}"
fi

if [[ -z "${PHP_FPM_GROUP}" ]]; then
  PHP_FPM_GROUP="www-data"
else
  PHP_FPM_GROUP="${PHP_FPM_GROUP}"
fi

groupadd $PHP_FPM_GROUP
useradd $PHP_FPM_USER -g $PHP_FPM_GROUP

sed -i -e "s/^user = .*/user = ${PHP_FPM_USER}/g" /etc/php-fpm.d/www.conf
sed -i -e "s/^group = .*/user = ${PHP_FPM_GROUP}/g" /etc/php-fpm.d/www.conf

composer config -g github-oauth.github.com b0eb54cdd6249b69186e2cde33a17cd6fdf6e28a

sleep 15

cd /var/www/ && composer install --prefer-source --no-interaction  -o && php yii migrate --interactive=0
cd /var/www/web && bower install socket.io-client --allow-root
cd /var/www/web && rm index.html
php-fpm --nodaemonize


