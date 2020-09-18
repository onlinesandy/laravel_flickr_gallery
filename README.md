# Laravel Flickr Gallery

This contains the application code for the  Laravel Flickr Gallery using Flickr API. 
	The app is build on top of [Laravel framework](http://laravel.com/docs) 
	which runs on the LAMP stack.


## Setting up

Follow these steps to set up the project.

```
git clone https://github.com/onlinesandy/laravel_flickr_gallery.git flickrGallery
cd flickrGallery
composer install
npm install
chmod -R 777 storage bootstrap/cache
cp .env.example .env
php artisan key:generate

create Database
Change the values in `.env` file 
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

Add two more paramaters in `.env`
FLICKR_APP_KEY=
FLICKR_APP_SECRET=

php artisan migrate

php artisan db:seed




```

## Start Server

```
php artisan serve



```



