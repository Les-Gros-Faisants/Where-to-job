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


/*
** LOCATION
*/

Route::get('/back', function()
{
	return Redirect::back();
});


Route::get('/location/{id?}/show', 'LocationController@show');
Route::get('/location/{id}/edit', 'LocationController@edit');

Route::get('/location/create',['as' => 'user.create', 'uses' => 'LocationController@Create']);
Route::post('/location/{id}/update',['as' => 'location.update', 'uses' => 'LocationController@Update']);
Route::post('/location/store',['as' => 'location.store', 'uses' => 'LocationController@Store']);


/*
** USER
*/

// route to process the form
Route::post('/user/login', array('uses' => 'UserController@Login'));

Route::get('/user/{id?}/show', 'UserController@show');
Route::get('/user/{id}/edit', 'UserController@edit');


Route::get('/user/create',['as' => 'user.create', 'uses' => 'UserController@Create']);

Route::post('contact', 'UserController@send');

Route::post('/',['as' => 'location.search', 'uses' => 'LocationController@Search']);

Route::post('/user/{id}/update',['as' => 'user.update', 'uses' => 'UserController@Update']);
Route::post('/user/store',['as' => 'user.store', 'uses' => 'UserController@Store']);

Route::controller('/', 'HomeController');
