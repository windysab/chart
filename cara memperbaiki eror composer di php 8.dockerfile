/c/laragon/bin/php/php-8.2/php.exe -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
/c/laragon/bin/php/php-8.2/php.exe composer-setup.php
/c/laragon/bin/php/php-8.2/php.exe -r "unlink('composer-setup.php');"
mv composer.phar /usr/local/bin/composer
/c/laragon/bin/php/php-8.2/php.exe /usr/local/bin/composer update


/c/laragon/bin/php/php-8.1/php.exe -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
/c/laragon/bin/php/php-8.1/php.exe composer-setup.php
/c/laragon/bin/php/php-8.1/php.exe -r "unlink('composer-setup.php');"
mkdir -p /c/laragon/bin/composer
mv composer.phar /c/laragon/bin/composer/composer.phar

/c/laragon/bin/php/php-8.2/php.exe /c/laragon/bin/composer/composer.phar update

/c/laragon/bin/php/php-8.2/php.exe -v
/c/laragon/bin/php/php-8.2/php.exe /c/laragon/bin/composer/composer.phar update



/c/laragon/bin/php/php-8.2/php.exe /c/laragon/bin/composer/composer.phar require ianw/quickchart


/c/laragon/bin/php/php-8.2/php.exe /c/laragon/www/chart/artisan make:controller ChartController

/c/laragon/bin/php/php-8.2/php.exe /c/laragon/www/chart/artisan make:controller ChartController

/c/laragon/bin/php/php-8.2/php.exe /c/laragon/www/chart/artisan serve


/c/laragon/bin/php/php-8.2/php.exe /c/laragon/www/chart/artisan key:generate

/c/laragon/bin/php/php-8.2/php.exe /c/laragon/www/chart/artisan config:cache

php artisan config:cache
php artisan route:cache
php artisan view:cache


php artisan key:generate


chmod -R 775 storage
chmod -R 775 bootstrap/cache
