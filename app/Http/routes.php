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

Route::post('regnskap/oppgavesett/{oppgavesett}',
    ['as' => 'oppgavesett.test', 'uses' => 'OppgavesettController@test']);

Route::delete('regnskap/oppgavesett/{oppgavesett}',
    ['as' => 'oppgavesett.slett', 'uses' => 'OppgavesettController@slett']);


// Besvarelser

Route::get('regnskap/besvarelser/{rolle?}',
    ['as' => 'besvarelser.opplist', 'uses' => 'BesvarelseController@opplist']);

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

// Oppgaver (bilagsmalsekvenser)

Route::get('regnskap/oppgaver',
    [
        'as' => 'regnskap.oppgaver.opplist',
        'uses' => 'Purmoduler\Regnskap\BilagsmalsekvensController@opplist'
    ]);

Route::get('regnskap/oppgaver/opprett',
    [
     'as' => 'regnskap.oppgaver.opprett',
     'uses' => 'Purmoduler\Regnskap\BilagsmalsekvensController@opprett'
    ]);

Route::post('regnskap/oppgaver',
    [
     'as' => 'regnskap.oppgaver.lagre',
     'uses' => 'Purmoduler\Regnskap\BilagsmalsekvensController@lagre'
    ]);

Route::get('regnskap/oppgaver/{bilagsmalsekvens}',
    [
        'as' => 'regnskap.oppgaver.vis',
        'uses' => 'Purmoduler\Regnskap\BilagsmalsekvensController@vis'
    ]);

Route::get('regnskap/oppgaver/{bilagsmalsekvens}/rediger',
    [
        'as' => 'regnskap.oppgaver.rediger',
        'uses' => 'Purmoduler\Regnskap\BilagsmalsekvensController@rediger'
    ]);

Route::put('regnskap/oppgaver/{bilagsmalsekvens}/oppdater',
    [
        'as' => 'regnskap.oppgaver.oppdater',
        'uses' => 'Purmoduler\Regnskap\BilagsmalsekvensController@oppdater'
    ]);

Route::patch('regnskap/oppgaver/{bilagsmalsekvens}/oppdater',
    [
        'uses' => 'Purmoduler\Regnskap\BilagsmalsekvensController@oppdater'
    ]);

Route::delete('regnskap/oppgaver/{bilagsmalsekvens}',
    [
        'as' => 'regnskap.oppgaver.slett',
        'uses' => 'Purmoduler\Regnskap\BilagsmalsekvensController@slett'
    ]);


// Bilagsmaler

Route::put('regnskap/bilagsmaler/{bilagsmal}/oppdater',
    [
        'as' => 'regnskap.bilagsmaler.oppdater',
        'uses' => 'Purmoduler\Regnskap\BilagsmalController@oppdater'
    ]);

Route::patch('regnskap/bilagsmaler/{bilagsmal}/oppdater',
    [
        'uses' => 'Purmoduler\Regnskap\BilagsmalController@oppdater'
    ]);


// TODO: Gjør til eksplisitte ruter:

$router->resource('posteringsmaler', 'Purmoduler\Regnskap\PosteringsmalController');
$router->resource('posteringer', 'Purmoduler\Regnskap\PosteringController');

