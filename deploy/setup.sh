#!/bin/bash 

cp /home/site/wwwroot/deploy/nginx-config /etc/nginx/sites-available/default
service nginx reload

cd /home/site/wwwroot && cp -n .env.production .env 
php artisan key:generate

touch database/database.sqlite
php artisan migrate --force

php artisan config:clear
php artisan config:cache