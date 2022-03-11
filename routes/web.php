<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers;
use App\Http\Controllers\UserController;
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
use Illuminate\Support\Facades\DB;

$router->get('/', function () use ($router) {
    return $router->app->version();
});




$router->post('/usuario', 'UserController@store');
$router->get('/usuario', 'UserController@show');
$router->put('/usuario', 'UserController@update');

$router->post('/usuarioPermiso', 'PermisoUsuarioController@store');
$router->get('/usuarioPermiso', 'PermisoUsuarioController@get');
$router->get('/usuarioPermiso/{id}', 'PermisoUsuarioController@show');