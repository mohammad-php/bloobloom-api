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

$router->group(['prefix' => 'api/admin', 'namespace' => 'Api\V1\Admin'], function() use ($router) {
    # Frames
    $router->group(['prefix' => 'frames'], function() use ($router) {
        $router->get('/', 'FrameController@index');
        $router->post('/', 'FrameController@create');
        $router->put('/{id}', 'FrameController@update');
        $router->delete('/{id}', 'FrameController@delete');
    });

    # Lenses
    $router->group(['prefix' => 'lenses'], function() use ($router) {
        $router->get('/', 'LensController@index');
        $router->post('/', 'LensController@create');
        $router->put('/{id}', 'LensController@update');
        $router->delete('/{id}', 'LensController@delete');
    });
});


$router->group(['prefix' => 'api', 'namespace' => 'Api\V1\User'], function() use ($router) {
    # Frames
    $router->group(['prefix' => 'frames'], function() use ($router) {
        $router->get('/view', 'FrameController@viewActive');
//        $router->post('/', 'FrameController@create');
//        $router->put('/{id}', 'FrameController@update');
//        $router->delete('/{id}', 'FrameController@delete');
    });

    # Lenses
    $router->group(['prefix' => 'lenses'], function() use ($router) {
        $router->get('/view', 'LensController@viewAll');
//        $router->post('/', 'LensController@create');
//        $router->put('/{id}', 'LensController@update');
//        $router->delete('/{id}', 'LensController@delete');
    });

    $router->post('/glass', 'GlassController@createGlass');

});
