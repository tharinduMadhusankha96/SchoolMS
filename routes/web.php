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

Route::get('Event/search','EventController@search');
Route::get('Event/monthlyEvent', 'EventController@monthlyEvent');
Route::get('Event/myevents','EventController@myevents');
Route::get('/Event/showEvent/{event}', 'EventController@showEvent');
Route::post('/Event/showEvent/{event}', 'EventController@updateImage');
Route::get('/Event/calendar', 'EventController@calendar');
Route::resource('Event' , 'EventController');

Route::post('Event/{event}/comment','CommentsController@store');
//Route::post('Event/{event}/comment/{comment}','CommentsController@destroy');

//Route::get('/Event','EventController@index');
//Route::post('/Event/create','EventController@create');
//Route::get('/Event/store','EventController@store');
//Route::get('/Event/show','EventController@show');



Route::get('/Sports', 'PagesController@sports');
Route::get('/Sports/Enroll', 'PagesController@cricket');




