# ASPRA

<!-- Setup -->
composer update
npm install
cp .env.example .env
php artisan key:generate
php artisan storage:link

php artisan migrate:fresh --seed

<!-- Hostinger Setup -->
cd domains/aspranetwork.com/
git clone -b development git@github.com:Nielioo/ASPRA.git
mv ASPRA/* ~/domains/aspranetwork.com/ && mv ASPRA/.[!.]* ~/domains/aspranetwork.com/ && rm -r ASPRA

ln -s ~/domains/aspranetwork.com/storage/app/public ~/domains/aspranetwork.com/public_html/storage
ln -s ~/domains/aspranetwork.com/public/* ~/domains/aspranetwork.com/public_html/

chmod -R 775 bootstrap/cache

<!-- Deploy -->
php artisan serve
npm run build
npm run dev
