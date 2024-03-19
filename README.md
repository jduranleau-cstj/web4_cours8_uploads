Étapes après avoir cloner le projet:

1. Copier/coller et renommer le fichier `.env.exemple` en `.env`
2. Créer une base de donnée vide dans PhpMyAdmin
3. Modifier la ligne `DB_DATABASE` dans le `.env`
4. Lancer la commande : `composer install`
5. Lancer la commande : `php artisan key:generate`
6. Lancer la commande : `php artisan serve`