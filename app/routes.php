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

Route::get('/404', function()
{
	return View::make('pages.404');
});

Route::get('/location/{id?}/show', 'LocationController@show');
Route::get('/location/{id}/edit', 'LocationController@edit');
Route::post('/location/{id}/update',['as' => 'location.update', 'uses' => 'LocationController@Update']);


Route::get('/user/{id?}/show', 'UserController@show');
Route::get('/user/{id}/edit', 'UserController@edit');
Route::post('/user/{id}/update',['as' => 'user.update', 'uses' => 'UserController@Update']);

Route::post('/',['as' => 'location.search', 'uses' => 'LocationController@Search']);


Route::controller('/', 'HomeController');