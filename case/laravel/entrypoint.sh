echo "Running Config for Laravel..."
composer install

php artisan optimize:clear
php artisan migrate

exec php-fpm
