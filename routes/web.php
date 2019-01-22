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
        Route::get('/cliente/detalhes/{id}', 'ClientController@detailsClientView')->name('client.details.view');
        Route::post('/cliente', 'ClientController@searchOnlyUser')->name('client.show.view');


    });



    route::group(['prefix'=> 'cadastrar'],function (){

        Route::get('/cliente', 'ClientController@createClientView')->name('client.create.view');
        Route::post('/cliente', 'ClientController@createClient')->name('client.create');
        Route::get('/serviço', 'ServiceController@serviceCreateView')->name('service.create.view');
        Route::post('/serviço', 'ServiceController@serviceCreate')->name('service.create');


    });

    route::group(['prefix'=> 'deletar'],function (){


        Route::get('/serviço/{id}', 'ServiceController@serviceDeleted')->name('service.deleted');
        Route::get('/cliente/{id}', 'ClientController@clientDeleted')->name('client.deleted');


    });

    route::group(['prefix'=> 'caixa'],function (){

        Route::get('/', 'CashierController@cashierView')->name('cashier.view');


    });

    Route::group(['prefix'=> 'agenda'],function (){

        Route::get('/', 'ScheduleController@scheduleView')->name('schedule.view');

        Route::group(['prefix'=> '{month}'],function (){

            Route::get('/', 'ScheduleController@scheduleMonthView')->name('schedule.month.view');

            Route::group(['prefix'=> '{days}'],function (){

                Route::get('/', 'ScheduleController@scheduleDetailsDayView')->name('schedule.details.day.view');

            });
        });

        Route::post('', 'ScheduleController@scheduleConfirm')->name('schedule.confirm');


    });


    route::group(['prefix'=> 'serviços'],function (){

        Route::get('/', 'ServiceController@serviceView')->name('service.view');

    });

    route::group(['prefix' => 'editar'],function(){

        Route::get('/cliente/{id}', 'ClientController@clientEditView')->name('client.edit.view');
        Route::post('/cliente', 'ClientController@editClient')->name('client.edit');
        Route::post('/cliente/{id}', 'ClientController@updateClient')->name('client.update');

    });



});