#!/bin/bash
if [[ -z "${NGINX_USER}" ]]; then
  NGINX_USER="www-data"
else
  NGINX_USER="${NGINX_USER}"
fi

if [[ -z "${NGINX_USER_GROUP}" ]]; then
  NGINX_USER_GROUP="www-data"
else
  NGINX_USER_GROUP="${NGINX_USER_GROUP}"
fi

userdel $NGINX_USER
groupdel $NGINX_USER_GROUP

groupadd $NGINX_USER_GROUP
useradd $NGINX_USER -g $NGINX_USER_GROUP

sed -i -e "s/^user .*/user ${NGINX_USER};/g" /etc/nginx/nginx.conf

nginx -g 'daemon off;'
