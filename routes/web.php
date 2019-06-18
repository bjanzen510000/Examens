<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Laat de welcome view zien wanneer je de applicatie bezoekt.
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// in de datacontroller worden alle meldingen opgehaalt, deze moeten op /home komen te staan.
Route::get('/home', 'DataController@index');
// De meldingen worden gemaakt in /meldingen,  de meldingencontroller maakt de meldingen aan.
Route::get('/meldingen', 'MeldingenController@Create');
// De melding moet opgeslagen worden door de controller Storemelding.
Route::post('/meldingen', 'MeldingenController@StoreMelding');
// De smiley moet veranderd kunnen worden, dit wordt gedaan in de controller berweksmiley.
Route::post('/meldingen/smiley-bewerken/{id}', 'MeldingenController@BewerkSmiley');
// De status moet ook veranderd kunnen worden, ook per ID, dit wordt gedaan in de controller BewerkStatus.
Route::post('/meldingen/status-bewerken/{id}', 'MeldingenController@BewerkStatus');
// haalt mijn-meldingen pagina op, hier komen alle meldingen per account in te staan, dus alleen je eigen meldingen kan je hier zien.
Route::get('/mijn-meldingen', 'MeldingenController@MijnMeldingen');
// haalt de beheercontroller op, de beheer pagina is te vinden op 127.0.0.1/beheer, dit is de admin pagina.
Route::get('/beheer', 'BeheerController@index');
// haalt de webcontroller op, de web pagina is te vinden op 127.0.0.1/web, dit is de admin pagina
Route::get('/web', 'WebController@index');




