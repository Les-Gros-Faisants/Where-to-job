<?php

class LocationController extends BaseController {

	/**
	* Display a listing of the resource.
	*
	* @return Response
	*/
	public function index()
	{
		//
	}


	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function create()
	{
		//
	}


	/**
	* Store a newly created resource in storage.
	*
	* @return Response
	*/
	public function store()
	{
		//
	}

	public function search()
	{
		$inputs = Input::except('_token');
		$view = View::make('pages.home');
		$view->withSearch($inputs);
		// découper la search et effectuer le tri dans la db
		return $view;

	}


	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function show($id = NULL)
	{
		$location = Location::where('id', '=', $id)->get();
		return View::make('location.show')->withLocation($location);
	}


	/**
	* Show the form for editing the specified resource	*
	* @param  int  $id
	* @return Response
	*/
	public function edit($id)
	{
		$location = Location::where('id', '=', $id)->get();
		$view = View::make('location.edit');
		$view->withLocation($location);
		return $view;
	}


	/**
	* Update the specified resource in storage and redirect the user to the "show" page of the location
	* Use Input::except to get all input from the 'edit' form
	* user array_filter to remove empty fields
	*
	* @param  int  $id
	* @return Response
	*/
	public function update($id)
	{
		$location = Location::where('id', '=', $id)->firstOrFail();
		$inputs = Input::except('_token');
		$inputs = array_filter($inputs, 'strlen');
		$location->update($inputs);
		return Redirect::to('/location/' . $id . '/show');
	}


	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function destroy($id)
	{
		//
	}


}
