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
php artisan route:clear
php artisan config:clear
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate
php artisan migrate:refresh
php artisan db:seed --class=ChartDataSeeder
php artisan db:seed --class=RealisasiSeeder
php artisan make:controller TestDBController
php artisan key:generate

php artisan serve --port=8080
php artisan cache:table
php artisan migrate


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


Untuk menyamakan data antara dua cabang (branch) di Git, Anda dapat menggunakan perintah `git merge` atau `git rebase`. Berikut adalah langkah-langkahnya:

    1. **Pastikan Anda berada di branch `a`:**
       ```sh
       git checkout a
       ```

    2. **Tarik perubahan terbaru dari remote repository:**
       ```sh
       git pull origin a
       ```

    3. **Gabungkan branch `b` ke branch `a`:**
       ```sh
       git merge b
       ```

       Atau jika Anda ingin menggunakan rebase:
       ```sh
       git rebase b
       ```

    4. **Selesaikan konflik jika ada, kemudian tambahkan dan komit perubahan:**
       ```sh
       git add .
       git commit -m "Resolve merge conflicts"
       ```

    5. **Dorong perubahan ke remote repository:**
       ```sh
       git push origin a
       ```

    Berikut adalah langkah-langkah dalam bentuk pseudocode:

    1. Checkout ke branch `a`.
    2. Tarik perubahan terbaru dari remote repository.
    3. Gabungkan branch `b` ke branch `a` atau lakukan rebase.
    4. Selesaikan konflik jika ada.
    5. Tambahkan dan komit perubahan.
    6. Dorong perubahan ke remote repository.

    Jika Anda memerlukan bantuan lebih lanjut atau ada konflik yang sulit diselesaikan, beri tahu saya!
# Inisialisasi repositori Git
git init

# Tambahkan semua file ke staging area
git add .

# Commit perubahan
git commit -m "Initial commit"

# Tambahkan remote origin
git remote add origin https://github.com/username/repository.git

# Push perubahan ke repositori remote
git push -u origin master
