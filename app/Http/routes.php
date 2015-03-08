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
use Pur\Bruker;
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


// Pur:
$router->resource('bruker', 'BrukerController');
$router->resource('oppgave', 'OppgaveController');
$router->resource('oppgavesett', 'OppgavesettController');
$router->resource('besvarelser', 'BesvarelseController');

// Purmoduler\Regnskap:
$router->resource('bilagssekvens', 'Purmoduler\Regnskap\BilagssekvensController');
$router->resource('bilagsmaler', 'Purmoduler\Regnskap\BilagsmalerController');
$router->resource('posteringsmal', 'Purmoduler\Regnskap\PosteringsmalController');
$router->resource('bilag', 'Purmoduler\Regnskap\BilagController');

