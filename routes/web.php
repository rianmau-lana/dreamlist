<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/dream', 'DreamListController@create');
$router->get('/dream', 'DreamListController@read');
$router->post('/dream/{id}', 'DreamListController@update');
$router->delete('/dream/{id}', 'DreamListController@delete');
$router->get('/dream/{id}', 'DreamListController@detail');
