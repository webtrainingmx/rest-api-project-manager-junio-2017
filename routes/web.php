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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/key', function () {
    return str_random(32);
});

// Users
$app->get('/users', ['uses' => 'UsersController@getAll']);
$app->get('/users/{id}', ['uses' => 'UsersController@getUser']);

$app->post('/users', ['uses' => 'UsersController@createUser']);

$app->put('/users/{id}', ['uses' => 'UsersController@updateUser']);
$app->delete('/users/{id}', ['uses' => 'UsersController@deleteUser']);
