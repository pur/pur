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

// -- PUR --

// Hvilke roller en bruker kan overstyre sin egen med:
$router->pattern('rolle', 'student');

// Hvilke purmoduler som er registrert:
$router->pattern('purmodul', 'regnskap');


Route::get('{purmodul}', function () {
    return redirect()->route('oppgavesett.opplist');
});

// Brukere

Route::get('brukere',
    ['as' => 'brukere.opplist', 'uses' => 'BrukerController@opplist']);

Route::get('brukere/opprett',
    ['as' => 'brukere.opprett', 'uses' => 'BrukerController@opprett']);

Route::post('brukere',
    ['as' => 'brukere.lagre', 'uses' => 'BrukerController@lagre']);

Route::get('brukere/{bruker}',
    ['as' => 'brukere.vis', function ($bruker) {
        return redirect()->route('brukere.rediger', [$bruker]);
    }]);

Route::get('brukere/{bruker}/rediger',
    ['as' => 'brukere.rediger', 'uses' => 'BrukerController@rediger']);

Route::get('bruker',
    ['as' => 'brukere.vis.innlogget', function () {
        return redirect()->route('brukere.rediger.innlogget');
    }]);

Route::get('bruker/rediger',
    ['as' => 'brukere.rediger.innlogget', 'uses' => 'BrukerController@redigerInnlogget']);

Route::put('brukere/{bruker}',
    ['as' => 'brukere.oppdater', 'uses' => 'BrukerController@oppdater']);

Route::put('bruker',
    ['as' => 'brukere.oppdater.innlogget', 'uses' => 'BrukerController@oppdaterInnlogget']);

Route::patch('brukere/{bruker}',
    ['uses' => 'BrukerController@oppdater']);

Route::patch('bruker',
    ['uses' => 'BrukerController@oppdaterInnlogget']);

Route::delete('brukere/{bruker}',
    ['as' => 'oppgaver.slett', 'uses' => 'BrukerController@slett']);


// TODO: Bytt 'regnskap/' med url-parameter {purmodul} og håndter i alle aktuelle controllere:

// Oppgaver

Route::get('regnskap/oppgaver/{rolle?}',
    ['as' => 'oppgaver.opplist', 'uses' => 'OppgaveController@opplist']);

//Route::get('regnskap/oppgaver/opprett',
//    ['as' => 'oppgaver.opprett', 'uses' => 'OppgaveController@opprett']);
//
//Route::post('regnskap/oppgaver',
//    ['as' => 'oppgaver.lagre', 'uses' => 'OppgaveController@lagre']);
//
//Route::get('regnskap/oppgaver/{oppgave}/{rolle?}',
//    ['as' => 'oppgaver.vis', 'uses' => 'OppgaveController@vis']);
//
//Route::get('regnskap/oppgaver/{oppgave}/rediger',
//    ['as' => 'oppgaver.rediger', 'uses' => 'OppgaveController@rediger']);
//
//Route::put('regnskap/oppgaver/{oppgave}',
//    ['as' => 'oppgaver.oppdater', 'uses' => 'OppgaveController@oppdater']);
//
//Route::patch('regnskap/oppgaver/{oppgave}',
//    ['uses' => 'OppgaveController@oppdater']);
//
//Route::delete('regnskap/oppgaver/{oppgave}',
//    ['as' => 'oppgaver.slett', 'uses' => 'OppgaveController@slett']);


// Oppgavesett

Route::get('regnskap/oppgavesett/{rolle?}',
    ['as' => 'oppgavesett.opplist', 'uses' => 'OppgavesettController@opplist']);

Route::get('regnskap/oppgavesett/opprett',
    ['as' => 'oppgavesett.opprett', 'uses' => 'OppgavesettController@opprett']);

Route::post('regnskap/oppgavesett',
    ['as' => 'oppgavesett.lagre', 'uses' => 'OppgavesettController@lagre']);

Route::get('regnskap/oppgavesett/{oppgavesett}/{rolle?}',
    ['as' => 'oppgavesett.vis', 'uses' => 'OppgavesettController@vis']);

Route::get('regnskap/oppgavesett/{oppgavesett}/rediger',
    ['as' => 'oppgavesett.rediger', 'uses' => 'OppgavesettController@rediger']);

Route::put('regnskap/oppgavesett/{oppgavesett}',
    ['as' => 'oppgavesett.oppdater', 'uses' => 'OppgavesettController@oppdater']);

Route::patch('regnskap/oppgavesett/{oppgavesett}',
    ['uses' => 'OppgavesettController@oppdater']);

Route::delete('regnskap/oppgavesett/{oppgavesett}',
    ['as' => 'oppgavesett.slett', 'uses' => 'OppgavesettController@slett']);


// Besvarelser

Route::get('regnskap/besvarelser/{rolle?}',
    ['as' => 'besvarelser.opplist', 'uses' => 'BesvarelseController@opplist']);

Route::get('regnskap/besvarelser/opprett',
    ['as' => 'besvarelser.opprett', 'uses' => 'BesvarelseController@opprett']);

Route::post('regnskap/besvarelser/{oppgavesett}',
    ['as' => 'besvarelser.lagre', 'uses' => 'BesvarelseController@lagre']);

Route::get('regnskap/besvarelser/{besvarelse}/{rolle?}',
    ['as' => 'besvarelser.vis', 'uses' => 'BesvarelseController@vis']);

Route::get('regnskap/besvarelser/{besvarelse}/rediger',
    ['as' => 'besvarelser.rediger', 'uses' => 'BesvarelseController@rediger']);

Route::put('regnskap/besvarelser/{besvarelse}',
    ['as' => 'besvarelser.oppdater', 'uses' => 'BesvarelseController@oppdater']);

Route::patch('regnskap/besvarelser/{besvarelse}',
    ['uses' => 'BesvarelseController@oppdater']);

Route::delete('regnskap/besvarelser/{besvarelse}',
    ['as' => 'besvarelser.slett', 'uses' => 'BesvarelseController@slett']);

// PURMODULER - REGNSKAP:

// TODO Lag norske rute– og controllermetode-navn:

Route::get('regnskap/bilagsmalsekvenser',
    [
        'as' => 'bilagsmalsekvenser.index',
        'uses' => 'Purmoduler\Regnskap\BilagsmalsekvensController@index'
    ]);

Route::get('regnskap/oppgaver/opprett',
    [
     'as' => 'regnskap.oppgaver.opprett',
     'uses' => 'Purmoduler\Regnskap\BilagsmalsekvensController@opprett'
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


// TODO: Gjør til eksplisitte ruter:

$router->resource('bilagsmaler', 'Purmoduler\Regnskap\BilagsmalController');
$router->resource('posteringsmaler', 'Purmoduler\Regnskap\PosteringsmalController');
$router->resource('posteringer', 'Purmoduler\Regnskap\PosteringController');

