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

use Illuminate\Http\Request;
use Pur\Besvarelse;
use Pur\Bruker;
use Pur\Oppgavesett;
use Pur\Purmoduler\Regnskap\Bilag;
use Pur\Purmoduler\Regnskap\Bilagsmal;
use Pur\Purmoduler\Regnskap\Bilagssekvens;
use Pur\Purmoduler\Regnskap\Formel;
use Pur\Purmoduler\Regnskap\Bilagsmalsekvens;
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
$router->resource('bilagsmalsekvens', 'Purmoduler\Regnskap\BilagsmalsekvensController');
$router->resource('bilagsmaler', 'Purmoduler\Regnskap\BilagsmalerController');
$router->resource('posteringsmal', 'Purmoduler\Regnskap\PosteringsmalController');
$router->resource('bilag', 'Purmoduler\Regnskap\BilagController');

Route::get('formel', function(Request $request){
    //return "Retur fra formel nr. $nr $verdi1 $verdi2  ";
    //return "test";
    //return $request->all();
    //return Formel::brukFormel($request->formelid, $request->verdi1, $request->verdi2, $request->verdi3 );
   // return $request->all();
    // $retur = $request->formelid . $request->verdi1 . $request->verdi2 . $request->verdi3;
    //$retur = json_encode($request->all());

    $retur = Formel::brukFormel($request->formelid, $request->verdi1, $request->verdi2, $request->verdi3);
    //$retur = \Pur\Purmoduler\Regnskap\Formel::brukFormel(2, 12, 32, 100);
    return $retur;
});

