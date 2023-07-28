#!/bin/bash

# Perform any pre-migration setup here (if needed)
composer install

# Run Laravel migrations
php artisan migrate

# Start the PHP development server
php artisan serve --host=0.0.0.0 --port=8000

# Add any post-migration commands here (if needed)
