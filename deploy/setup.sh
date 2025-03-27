#!/bin/bash 

cp /etc/nginx/sites-enabled/default /home/site/ext

cp /home/site/wwwroot/deploy/nginx-config /etc/nginx/sites-available/default
service nginx reload

cd /home/site/wwwroot && cp -n .env.example .env 
php artisan key:generate

touch database/database.sqlite
php artisan migrate --force
