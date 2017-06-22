**Hello!**

**I recommend use Docker for quick installation.**

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

**If you installation without Docker**

You need to have: php (7.x recomend)

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
cd /web
```
```bash
bower install socket.io-client
```

```bash
cd /app
```
```bash
npm install socket.io
```
```bash
node app.js
```