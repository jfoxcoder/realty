<?php

class SessionsController extends \BaseController {




    /**
	 * Show the login form
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}





	/**
	 * Login
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

        $attempt = Auth::attempt([
            'email' => $input['email'],
            'password' => $input['password']
        ]);

        if ($attempt) {
            return Redirect::intended('/');
        }

        return Redirect::back()
                       ->withInput()
                       ->with('flash_message', 'Invalid credentials');
	}





	/**
	 * Logout
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

        return Redirect::home()->with('flash_message', 'You have been logged out.');
	}
}
