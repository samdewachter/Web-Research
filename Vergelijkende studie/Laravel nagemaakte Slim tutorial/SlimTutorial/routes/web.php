<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

Route::get('/ticket/new', 'TicketController@index');
Route::post('/ticket/add', 'TicketController@add');
Route::get('/ticket/details/{id}', 'TicketController@details');
Route::post('/ticket/delete/{ticket}', 'TicketController@delete');
Route::get('/ticket/edit/{ticket}', 'TicketController@edit');
Route::post('/ticket/update/{id}', 'TicketController@update');