
# How to use Small CRUD App

git clone the project and run composer.

    $ git clone https://github.com/rotemgrim/crud.git
        
    $ composer install
     
create .env file from example and configure the DB

Run migrations in laravel
      
    $ php artisan migrate
      
Start laravel dev server
 
    $ php artisan serve

The App is ready to load all posts from jsonplaceholder.

    naviagete to: http://127.0.0.1:8000/admin/load-posts
      
 
## The Crud App is ready.

    navigate to: http://127.0.0.1:8000/admin/posts
