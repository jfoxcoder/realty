<?php namespace admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class AdminSessionsController extends \BaseController {




    /**
	 * Show the admin login form
	 *
	 * @return Response
	 */
	public function create()
	{
        Log::info('admin login'); //'admin.listings.edit

		return View::make('admin.sessions.create');
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
            'password' => $input['password'],
            'admin' => true // make sure they're an admin
        ]);

        if ($attempt) {
            return Redirect::route('admin.home');

        }

        return Redirect::back()
                       ->withInput()
                       ->with('flash_message', 'Invalid Admin credentials');
	}





	/**
	 * Logout of admin area.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

        return Redirect::adminLogin()->with('flash_message', 'You have been logged out of admin area.');
	}
}
