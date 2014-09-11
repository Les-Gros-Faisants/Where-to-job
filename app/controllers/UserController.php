<?php

class UserController extends \BaseController {

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
		$view = View::make('user.createOrUpdate');
		return $view;
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$newUser = new User;
		$inputs = Input::except('_token');
		Input::replace(array('password' => Hash::make(Input::get('password'))));
		$inputs = array_filter($inputs, 'strlen');
		$newUser->update($inputs);

		$user_id = $newUser->id;
		$user = User::where('id', '=', $user_id)->get();
		return Redirect::to('/user/' . $user_id . '/show');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::where('id', '=', $id)->get();
		return View::make('user.show')->withUser($user);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::where('id', '=', $id)->get();
		$view = View::make('user.createOrUpdate');
		$view->withUser($user);
		return $view;
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::where('id', '=', $id)->firstOrFail();
		$inputs = Input::except('_token');
		$inputs = array_filter($inputs, 'strlen');
		$user->update($inputs);
		return Redirect::to('/user/' . $id . '/show');
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
