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

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');


Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

/* Tickets */

Route::get('ticket/nouveau','TicketController@create');
Route::post('ticket/enregistrer','TicketController@store');
Route::get('ticket/{id}/consulter','TicketController@consulter');
Route::get('ticket/{id}/show','TicketController@show');

/* Traitemnts */
Route::get('ticket/{id}/traiter','TraitementController@create');
Route::post('traitement/enregistrer','TraitementController@store');

Route::get('/api/tickets',function(){
  return \App\Ticket::All();
});
