cp supervisord.conf /etc/supervisor/conf.d/supervisord.conf

if [ ! -f /var/www/html/.env ]; then
  cp /var/www/html/.env.example /var/www/html/.env
fi

php artisan key:generate
php artisan optimize:clear

dockerize -wait tcp://mysql:3306 -timeout 60s

if ! php artisan migrate --force; then
  echo "Migration işlemi başarısız oldu."
  exit 1
fi

if ! php artisan db:seed; then
  echo "Seeder işlemi başarısız oldu."
  exit 1
fi

exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf

