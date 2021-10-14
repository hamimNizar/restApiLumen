<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/mahasiswa', [
        'uses' => 'MahasiswaController@index'
]);
$router->get('/search', [
        'uses' => 'MahasiswaController@search'
]);
$router->post('/create', [
        'uses' => 'MahasiswaController@create'
]);
$router->put('/update/{idmhs}', [
        'uses' => 'MahasiswaController@update'
]);
$router->delete('/delete/{idmhs}', [
        'uses' => 'MahasiswaController@delete'
]);