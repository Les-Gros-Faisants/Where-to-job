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
	return View::make('pages.home');
});

<<<<<<< HEAD
Route::get('/location/show/{id?}', 'LocationController@show');

=======
>>>>>>> origin/master
Route::get('/404', function()
{
	return View::make('pages.404');
});
<<<<<<< HEAD
=======

Route::get('/location/show/{id?}', 'locationController@show');
Route::get('/location/edit/{id}', 'locationController@edit');
>>>>>>> origin/master
