<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

<<<<<<< HEAD

Route::get('user/{id?}', 'UserController@showProfile');
=======
Route::get('user/{id}', 'UserController@showProfile');
>>>>>>> 20f201e33e3b11dd95793337cccb9904964679d8
