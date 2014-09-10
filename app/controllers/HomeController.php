<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function getAbout() {
		return View::make('pages.about');
	}

	public function getContact() {
		return View::make('pages.contact');
	}

	public function getProjects() {
		return View::make('pages.projects');
	}

	public function getHome() {
		return View::make('pages.home');
	}

}
