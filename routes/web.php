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
    return view('partials.landing');
});

Route::get('/events', 'EventController@index')->name("events");
Route::get('/events/create', 'EventController@getAdd')->name('getAddEvents');
Route::post('/events/create', 'EventController@add');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
