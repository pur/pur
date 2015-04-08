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


// Pur:
$router->resource('brukere', 'BrukerController');
$router->resource('oppgaver', 'OppgaveController');
$router->resource('oppgavesett', 'OppgavesettController');

Route::get('regnskap/laerer/oppgavesett',
    [
        'as' => 'oppgavesett.listOppForLaerer',
        'uses' => 'OppgavesettController@listOppForLaerer',
        'middleware' => 'laerer'
    ]);

Route::get('regnskap/student/oppgavesett',
    [
        'as' => 'oppgavesett.listOppForStudent',
        'uses' => 'OppgavesettController@listOppForStudent'
    ]);

// Venter med dette så ikke GUI krasjer helt:

//Route::get('regnskap/laerer/oppgavesett/{oppgavesett}',
//    [
//        'as' => 'oppgavesett.visForLaerer',
//        'uses' => 'OppgavesettController@vis',
//    ]);
//Route::get('regnskap/student/oppgavesett/{oppgavesett}',
//    [
//        'as' => 'oppgavesett.visForStudent',
//        'uses' => 'OppgavesettController@vis',
//    ]);
//Route::get('regnskap/laerer/oppgavesett/{oppgavesett}/rediger',
//    [
//        'as' => 'oppgavesett.rediger',
//        'uses' => 'OppgavesettController@rediger',
//    ]);
//Route::get('regnskap/student/oppgavesett/{oppgavesett}/rediger',
//    [
//        'as' => 'oppgavesett.rediger',
//        'uses' => 'OppgavesettController@rediger',
//    ]);

$router->resource('besvarelser', 'BesvarelseController');

// Purmoduler\Regnskap:

Route::get('regnskap/bilagsmalsekvenser',
    [
        'as' => 'bilagsmalsekvenser.index',
        'uses' => 'Purmoduler\Regnskap\BilagsmalsekvensController@index'
    ]);
Route::get('regnskap/bilagsmalsekvenser/{bilagsmalsekvenser}',
    [
        'as' => 'bilagsmalsekvenser.show',
        'uses' => 'Purmoduler\Regnskap\BilagsmalsekvensController@show'
    ]);
Route::get('regnskap/bilagsmalsekvenser/{bilagsmalsekvenser}/rediger',
    [
        'as' => 'bilagsmalsekvenser.edit',
        'uses' => 'Purmoduler\Regnskap\BilagsmalsekvensController@edit'
    ]);
Route::get('regnskap/bilagsmalsekvenser/{bilagsmalsekvenser}/update',
    [
        'as' => 'bilagsmalsekvenser.update',
        'uses' => 'Purmoduler\Regnskap\BilagsmalsekvensController@update'
    ]);

$router->resource('bilagsmaler', 'Purmoduler\Regnskap\BilagsmalController');
$router->resource('posteringsmaler', 'Purmoduler\Regnskap\PosteringsmalController');
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