Simple Symfony2 Blog application
========================

Current version is not stable.


1) Install
----------------------------------

### Clone the repo & download composer
	git clone git@github.com:devsoul/symfony2blog.git symfony2blog
	cd symfony2blog
	curl -sS https://getcomposer.org/installer | php
	php composer.phar install //during the installation you should set up your database credentials

### Create database 
	php app/console doctrine:database:create
	php app/console doctrine:schema:update --force

### Insert demo data
	php app/console doctrine:fixtures:load -n

### Run the application
	php app/console server:run

### Enjoy
	Frontend: http://127.0.0.1:8000/
	Backend:  http://127.0.0.1:8000/admin
	Credentials: admin@admin.com # admin

