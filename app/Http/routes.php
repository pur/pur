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

use Pur\Besvarelse;
use Pur\Oppgavesett;
use Pur\Purmoduler\Regnskap\Bilag;
use Pur\Purmoduler\Regnskap\Bilagsmal;
use Pur\Purmoduler\Regnskap\Bilagssekvens;
use Pur\Purmoduler\Regnskap\Posteringsmal;

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


$router->resource('bruker', 'BrukerController');
$router->resource('oppgave', 'OppgaveController');
$router->resource('oppgavesett', 'OppgavesettController');
$router->bind('oppgavesett', function ($id) {
    return Oppgavesett::whereId($id)->first();
});

$router->resource('besvarelser', 'BesvarelseController');
$router->bind('besvarelser', function ($id) {
    return Besvarelse::whereId($id)->first();
});

// Purmoduler/Regnskap:
$router->resource('bilagssekvens', 'Purmoduler\Regnskap\BilagssekvensController');
$router->bind('bilagssekvens', function ($id) {
    return Bilagssekvens::whereId($id)->first();
});

$router->resource('bilagsmaler', 'Purmoduler\Regnskap\BilagsmalerController');
;$router->bind('bilagsmaler', function ($id) {
    return Bilagsmal::whereId($id)->first();
});

$router->resource('posteringsmal', 'Purmoduler\Regnskap\PosteringsmalController');
$router->bind('posteringsmal', function ($id) {
    return Posteringsmal::whereId($id)->first();
});

$router->resource('bilag', 'Purmoduler\Regnskap\BilagController');
$router->bind('bilag', function ($id) {
    return Bilag::whereId($id)->first();
});
