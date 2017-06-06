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

// We are using a Middleware that doesn't require configuration
// https://github.com/vluzrmos/lumen-cors
$app->group(['middleware' => ['auth']], function () use ($app) {
    // Projects
    $app->get('/projects', ['uses' => 'ProjectsController@getAll']);
    $app->get('/projects/{id}', ['uses' => 'ProjectsController@getProject']);

    $app->post('/projects', ['uses' => 'ProjectsController@createProject']);

    $app->put('/projects/{id}', ['uses' => 'ProjectsController@updateProject']);
    $app->delete('/projects/{id}', ['uses' => 'ProjectsController@deleteProject']);

// Issues
    $app->get('/issues', ['uses' => 'IssuesController@getAll']);
    $app->get('/issues/{id}', ['uses' => 'IssuesController@getIssue']);

    $app->post('/issues', ['uses' => 'IssuesController@createIssue']);

    $app->put('/issues/{id}', ['uses' => 'IssuesController@updateIssue']);
    $app->delete('/issues/{id}', ['uses' => 'IssuesController@deleteIssue']);

// Users
    $app->get('/users', ['uses' => 'UsersController@getAll']);
    $app->get('/users/{id}', ['uses' => 'UsersController@getUser']);

    $app->post('/users', ['uses' => 'UsersController@createUser']);
    $app->post('/users/token', ['uses' => 'UsersController@getToken']);

    $app->put('/users/{id}', ['uses' => 'UsersController@updateUser']);
    $app->delete('/users/{id}', ['uses' => 'UsersController@deleteUser']);
});

