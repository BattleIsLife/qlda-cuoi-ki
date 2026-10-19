#!/bin/sh
set -e
# Kiểm tra đã tồn tại file chưa, nếu chưa thì bắt đầu tiến hành cài đặt
if [ -z "$(ls -A /var/www/html/vendor)" ]; then
    echo "Tiến hành cài đặt dependencies"
    composer install --no-interaction --optimize-autoloader

    echo "Creating .env file..."
    cp /var/www/html/.env.example /var/www/html/.env

    # Tạo app key
    echo "Generating app key..."
    php artisan key:generate

    # Migration
    echo "Tiến hành migration"
    php artisan migrate

#     service apache2 reload
fi

chown -R www-data:www-data /var/www/html/storage
# chmod 755 -R /var/www/html/storage

exec "$@"