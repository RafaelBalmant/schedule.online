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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/teste', 'ClientController@teste');



route::group([ 'middleware' => 'auth'] ,function(){

    route::group(['prefix'=> 'buscar'],function (){

        Route::get('/clientes', 'ClientController@showClientsView')->name('clients.show.view');
        Route::post('/clientes', 'ClientController@showClients')->name('clients.show');

    });



    route::group(['prefix'=> 'cadastro'],function (){

        Route::get('/cliente', 'ClientController@createClientView')->name('client.create.view');
        Route::post('/cliente', 'ClientController@createClient')->name('client.create');

    });



});