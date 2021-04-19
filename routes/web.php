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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'Ad'], function () use ($router) {
        $router->get('index', ['uses' => 'CustomerController@index']);
        $router->post('create-ad', ['uses' => 'CustomerController@store']);
        $router->post('slip-upload',['uses' => 'CustomerController@payementslipUpload']);
        $router->get('index/{ads}', ['uses' => 'CustomerController@show']);
        $router->put('editAd/{ads}', ['uses' => 'CustomerController@update']);
        $router->delete('removeAd/{ads}', ['uses' => 'CustomerController@destroy']);
    });
});
