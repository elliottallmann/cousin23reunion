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
Route::get('/events/create/{id}', 'EventController@getRSVP')->name('getRSVP');
Route::post('/events/rsvp', 'EventController@rsvp');
Route::get("/events/{id}", "EventController@detail")->name('detail');
Route::get("/events/edit/{id}", "EventController@edit")->name('editEvent');
Route::post("/events/edit", "EventController@update")->name('updateEvent');



Route::get("/myEvents", "EventController@userEvents")->name("userEvents");
Route::get("/myEvents/edit/{id}", "EventController@getEditUserRegistration")->name("editUserRegistration");
Route::post("myEvents/update", "EventController@updateUserRegistration")->name("updateUserRegistration");
Route::get("/myEvents/cancel/{id}", "EventController@cancelUserRegistration")->name("cancelUserRegistration");
Route::get("/myEvents/edit/event/{eventId}", "EventController@editUserRegistration")->name("getUserEventRegistration");

Route::get("/profile", "UserController@index")->name("profileDetails");
Route::post("/profile", "UserController@update")->name("updateProfile");


Route::get("/calendar", function() {
    return view("calendar");
})->name("calendar");

Route::get("/hotel", function() {
    return view ("hotel");
})->name("hotel");

Route::get("/leisure", "EventController@leisure")->name("leisure");

Route::get("/transportation", function () {
    return view("transportation");
})->name("transportation");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
