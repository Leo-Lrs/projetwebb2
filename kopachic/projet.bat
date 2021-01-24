@echo off
:accueil
call composer update
cp donnees.md .env
php artisan key:generate
echo Assurez-vous que votre base de donnees soit bien demarree avant de faire la migration. Veuillez remplir votre fichier .env avant de continuer
pause
call php artisan migrate:fresh
call php artisan db:seed
pause