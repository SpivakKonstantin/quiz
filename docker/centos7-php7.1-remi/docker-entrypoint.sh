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

php-fpm --nodaemonize
