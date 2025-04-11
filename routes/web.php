<?php

use App\Services\Router\Route;

###############################################
#   Samples of laravel routing definition     #   
###############################################


#string parametres for routing
Route::add('get', '/', 'HomeController@index');

Route::get('get', '/articles/articles', 'ArticlesController@index');

#callback parameters for routing
Route::add('get', '/articles/products', function () {
    echo "Welcome to function callback !!!";
});

#array parameters for routing
Route::add(['get', 'post'], '/articles/posts', ['ArticlesController', 'posts']);
