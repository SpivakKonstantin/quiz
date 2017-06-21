**Hello!**

**I recomended use Docker for quick installation.**

If you use docker you can get easy development envirement. (https://www.docker.com/)

After git clone:

In project:
```bash
$ docker-compose build
```
```bash
$ docker-compose up -d
```
And then you need to wait. 10-15 min 

**If you instalation without Docker**

You need to have: php > 5.6 (7.x recomend)

Mariadb or Mysql

Node.js

After git clone
```bash
composer install --prefer-source --no-interaction  -o 
```

And you need to create empty dbname "yii2basic" and change db config: /config/db.php
```bash
php yii migrate --interactive=0
```
```bash
cd /web && bower install socket.io-client --allow-root
```

```bash
cd /app && node app.js
```