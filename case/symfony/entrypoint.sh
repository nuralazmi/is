echo "Running Config for Symfony..."

composer install

php bin/console cache:clear
php bin/console doctrine:migrations:migrate

exec php-fpm
