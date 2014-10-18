Simple Symfony2 Blog application
========================

TODO


1) Install
----------------------------------

### Create database 
	php app/console doctrine:database:create
	php app/console doctrine:migrations:migrate -n

### Insert demo data
	php app/console doctrine:fixtures:load -n

### Run the application
	php app/console server:run

### Enjoy
	Frontend: http://localhost:8000/
	Backend:  http://localhost:8000/admin
	Credentials: admin@admin.com # admin

### Use Composer (*recommended*)

TODO
