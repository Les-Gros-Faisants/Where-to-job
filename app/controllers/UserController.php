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
		$view = View::make('user.edit');
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

	public function send()
	{
		$fromEmail = Input::get('email');
    	$fromName = Input::get('username');
    	$data = Input::get('message');
    	$subject = 'Mail from where to job user';

    	$toEmail = 'david.henner@epitech.eu';
    	$toName = 'David Henner';

	    Mail::send('emails.contact', array('data' =>  $data), function($message) use ($toEmail, $toName, $fromEmail, $fromName, $subject)
    	{
    		$message->to($toEmail, $toName)->subject($subject);
//       		$message->to($toEmail, $toName);
  	 		$message->from($fromEmail, $fromName);
	//		$message->subject($subject);
	    });

		return Redirect::to('/');
	}


}
