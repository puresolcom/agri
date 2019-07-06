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
$app->get('/', function () {
    return 'You\'re here cuz you\'re someone awesome!';
});

$app->group(['prefix' => 'users'], function () use ($app) {
    $app->post('/', 'UsersController@create');
    $app->post('login', 'UsersController@login');
    $app->get('/', 'UsersController@index');
    $app->get('/{id}', 'UsersController@get');
    $app->get('/{id}/roles', 'UsersController@getRoles');
    $app->group(['middleware' => ['auth']], function () use ($app) {
        $app->put('/{id}', 'UsersController@update');
    });
});

$app->group(['prefix' => 'roles'], function () use ($app) {
    $app->get('/', 'RolesController@index');
    $app->get('/{id}', 'RolesController@get');
    $app->group(['middleware' => ['auth', 'role:administrator']], function () use ($app) {
        $app->post('/', 'RolesController@create');
        $app->put('/{id}', 'RolesController@update');
        $app->delete('/{id}', 'RolesController@delete');
    });
});

$app->group(['prefix' => 'tractors'], function () use ($app) {
    $app->get('/', 'TractorsController@index');
    $app->get('/{id}', 'TractorsController@get');
    $app->group(['middleware' => ['auth', 'role:administrator']], function () use ($app) {
        $app->post('/', 'TractorsController@create');
        $app->put('/{id}', 'TractorsController@update');
        $app->delete('/{id}', 'TractorsController@delete');
    });
});

$app->group(['prefix' => 'fields'], function () use ($app) {
    $app->get('/', 'FieldsController@index');
    $app->get('/{id}', 'FieldsController@get');
    $app->group(['middleware' => ['auth']], function () use ($app) {
        $app->post('/', 'FieldsController@create');
        $app->put('/{id}', 'FieldsController@update');
        $app->delete('/{id}', 'FieldsController@delete');
    });
});

$app->group(['prefix' => 'field_types'], function () use ($app) {
    $app->get('/', 'FieldTypesController@index');
    $app->get('/{id}', 'FieldTypesController@get');
    $app->group(['middleware' => ['auth', 'role:administrator']], function () use ($app) {
        $app->post('/', 'FieldTypesController@create');
        $app->put('/{id}', 'FieldTypesController@update');
        $app->delete('/{id}', 'FieldTypesController@delete');
    });
});


$app->group(['prefix' => 'processed_fields'], function () use ($app) {
    $app->get('/', 'ProcessedFieldsController@index');
    $app->get('/{id}', 'ProcessedFieldsController@get');
    $app->group(['middleware' => ['auth', 'role:administrator|moderator']], function () use ($app) {
        $app->put('/{id}', 'ProcessedFieldsController@update');
    });
    $app->group(['middleware' => ['auth', 'role:administrator']], function () use ($app) {
        $app->post('/', 'ProcessedFieldsController@create');
        $app->delete('/{id}', 'ProcessedFieldsController@delete');
    });
});
