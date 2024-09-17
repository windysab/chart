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
php artisan db:seed --class=RealisasiSeeder
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


git checkout -b tamplete_baru

sudo chmod -R 775 storage bootstrap/cache
sudo chown -R www-data:www-data storage bootstrap/cache

php artisan config:cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear


# Menghapus file setup composer jika ada
/c/laragon/bin/php/php-8.2/php.exe -r "unlink('composer-setup.php');"

# Mengunduh dan menginstal Composer menggunakan PHP 8.2
/c/laragon/bin/php/php-8.2/php.exe -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
/c/laragon/bin/php/php-8.2/php.exe composer-setup.php
/c/laragon/bin/php/php-8.2/php.exe -r "unlink('composer-setup.php');"

# Membuat direktori untuk Composer dan memindahkan file Composer
mkdir -p /c/laragon/bin/composer
mv composer.phar /c/laragon/bin/composer/composer.phar

# Memperbarui dependensi menggunakan Composer dan PHP 8.2
/c/laragon/bin/php/php-8.2/php.exe /c/laragon/bin/composer/composer.phar update

# Memverifikasi versi PHP yang digunakan
/c/laragon/bin/php/php-8.2/php.exe -v

# Memperbarui dependensi lagi untuk memastikan semuanya terbarui
/c/laragon/bin/php/php-8.2/php.exe /c/laragon/bin/composer/composer.phar updatephp


cp .env.example .env


git add .gitignore
git commit -pagu "Update .gitignore to include vendor and node_modules"