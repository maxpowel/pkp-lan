PKP Lan
==============

How to install
---------------------------

* `git clone https://github.com/maxpowel/pkp-lan.git`
* `cd pkp-lan`
* `composer install`
* `Configure your app/parameters.yml`
* `php bin/console doctrine:database:create`
* `php bin/console doctrine:schema:create`
* `php bin/console doctrine:fixtures:load --append`
* `php bin/console assets:install --symlink`
* `php bin/console server:run`


Admin panel
-------------------------
Just got to http://127.0.0.1:8000/admin/ and enjoy. You will need and admin user, if you dont have one type:
* `php bin/console fos:user:promote` then write your username and ROLE_ADMIN as role


Lan postion
----------
Go to the index, register and you will be redirected to the map where you can choose you position
