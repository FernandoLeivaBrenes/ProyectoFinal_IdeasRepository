#!/bin/bash

# Use composer to install vendor and all composer.json bundles
composer install -q --no-ansi --no-interaction --no-progress --prefer-dist

# Change permits of following directories (they have to be written by others)
chmod -R o+w ./storage/framework/sessions/ ./storage/framework/testing/ ./storage/framework/views/ ./storage/framework/cache/ ./storage/logs/ ./bootstrap/cache

# If file .env is not there, create it and apply Laravel keys on it
if [ ! -f ".env" ]; then
    cp .env.example .env
    # generate Laravel key
    php artisan key:generate
fi

# Check if mysql its healthy
wait-for-it -h ideasrepository-mysql -p 3306 -t 50

# Make migrations to database and seed them.
php artisan migrate:fresh --seed || php artisan migrate
