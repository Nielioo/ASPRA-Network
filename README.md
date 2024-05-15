# ASPRA

<!-- Setup -->
composer update
npm install
cp .env.example .env
php artisan key:generate
php artisan storage:link

<!-- Deploy -->
php artisan serve
npm run dev