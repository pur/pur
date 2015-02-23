<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
$router->resource('bruker', 'BrukerController');
$router->resource('oppgave', 'OppgaveController');

$router->resource('bilagsmaler', 'Purmoduler\Regnskap\BilagsmalerController');
$router->resource('bilagssekvens', 'Purmoduler\Regnskap\BilagssekvensController');


$router->bind('bilagssekvens', function ($id) {
    return Pur\Purmoduler\Regnskap\Bilagssekvens::whereId($id)->first();
});