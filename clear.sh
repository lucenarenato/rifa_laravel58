#!/bin/bash

php artisan cache:clear

php artisan config:cache

php artisan view:clear

php artisan route:cache

php artisan route:clear

php artisan clear-compiled

php artisan optimize --force

composer dumpautoload -o

