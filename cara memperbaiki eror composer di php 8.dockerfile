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
/c/laragon/bin/php/php-8.2/php.exe /c/laragon/www/chart/artisan migrate
/c/laragon/bin/php/php-8.2/php.exe /c/laragon/www/chart/artisan tinker
/c/laragon/bin/php/php-8.2/php.exe /c/laragon/www/chart/artisan make:controller TestDBController
/c/laragon/bin/php/php-8.2/php.exe /c/laragon/www/chart/artisan make:migration create_chart_data_table --create=chart_data
/c/laragon/bin/php/php-8.2/php.exe /c/laragon/www/chart/artisan make:seeder ChartDataSeeder
/c/laragon/bin/php/php-8.2/php.exe /c/laragon/www/chart/artisan db:seed --class=ChartDataSeeder

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate
php artisan migrate:refresh
php artisan db:seed --class=ChartDataSeeder
php artisan make:controller TestDBController
php artisan key:generate


chmod -R 775 storage
chmod -R 775 bootstrap/cache


DB::table('stastistik')->get();


npm install -D tailwindcss
npx tailwindcss init


cd C:\laragon\www\chart
npm install -D tailwindcss
npx tailwindcss init

chmod 644 public/css/chart.css
chmod 644 public/js/chart.js



mkdir -p public/js
touch public/js/chart.js

mkdir -p public/css
touch public/css/chart.css
