# ASPRA
<!-- Hostinger Setup -->
cd domains/aspranetwork.com/
git clone -b main git@github.com:Nielioo/ASPRA.git
mv ASPRA/* ~/domains/aspranetwork.com/ && mv ASPRA/.[!.]* ~/domains/aspranetwork.com/ && rm -r ASPRA && mkdir public_html
mv public/* public_html && mv public/.[!.]* public_html

ln -s ~/domains/aspranetwork.com/storage/app/public ~/domains/aspranetwork.com/public_html/storage
npm run build && ln -s ~/domains/aspranetwork.com/public/* ~/domains/aspranetwork.com/public_html/

chmod -R 775 bootstrap/cache

<!-- Update directory with Github -->
cd domains/aspranetwork.com/
git pull origin main

<!-- Setup -->
composer update
npm install
cp .env.example .env
php artisan key:generate

php artisan migrate:fresh --seed

<!-- Deploy -->
php artisan serve
npm run dev

<!-- Others -->
<!-- if library like composer/node/npm didn't work -->
source ~/.bashrc

<!-- How to install nodejs: https://vidler.app/blog/javascript/nodejs/install-nodejs-npm-shared-web-server/ -->
