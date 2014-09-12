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
		$inputs = array_filter($inputs, 'strlen');
		$newUser->updateFull($inputs);
		$newUser->password = Hash::make(Input::get('password'));
		$newUser->save();
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
		$user->updateFull($inputs);
		if (null !== (Input::get('password')))
		{
			$user->password = Hash::make(Input::get('password'));
			$user->save();
		}
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
		$validation = Validator::make(
			['username' => Input::get('username'), 'email' => Input::get('email'), 'message' => Input::get('message')],
			['username' => 'required', 'email' => 'required', 'message' => 'required']);

		if ($validation->fails())
		{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}

		else
		{
			$fromEmail = Input::get('email');
			$fromName = Input::get('username');
			$data = Input::get('message');
			$subject = 'Mail from whereToJob user';

			$toEmail = 'nrdav@hotmail.fr';
			$toName = 'Julien Ganichot';

			Mail::send('emails.contact', array('data' =>  $data, 'name' => $fromName, 'email' => $fromEmail),
				function($message) use ($toEmail, $toName, $fromEmail, $fromName, $subject)
				{
					$message->to($toEmail, $toName)->subject($subject);
//       		$message->to($toEmail, $toName);
					$message->from($fromEmail, $fromName);
	//		$message->subject($subject);
				});
		}

		return Redirect::to('/');
	} 
	/**
	 *
	 * Try to login the user
	 *
	 **/

	public function login()
	{
	// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required', // make sure the email is an actual email
			'password' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
			);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('/404')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
			} else {

			// create our user data for the authentication
				$userdata = array(
					'email' 	=> Input::get('email'),
					'password' 	=> Input::get('password')
					);

			// attempt to do the login
				if (Auth::attempt($userdata))
					return Redirect::to('/user/create');
				else
					return Redirect::to('/');
			}
		}

		public function loginFB() {
			$code = Input::get( 'code' );
			$fb = OAuth::consumer( 'Facebook' );

			if ( !empty( $code ) ) {
				$token = $fb->requestAccessToken( $code );
				$result = json_decode( $fb->request( '/me' ), true );
				$message = 'Your unique facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
				echo $message. "<br/>";
				dd($result);
			}
			else {
				$url = $fb->getAuthorizationUri();
				return Redirect::to( (string)$url );
			}

		}

		public function logout()
		{
			Auth::logout();
			return Redirect::to('/');
		}
	}
