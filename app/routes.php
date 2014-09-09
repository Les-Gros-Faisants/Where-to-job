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
Route::get('/404', function()
{
	return View::make('pages.404'); 
});
>>>>>>> 7d88e0644a1398566b4ec93b92a674ade386844c
