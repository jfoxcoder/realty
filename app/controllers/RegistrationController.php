<?php

use joseph\forms\RegistrationForm;

class RegistrationController extends \BaseController {


    /**
     * @var RegistrationForm
     */
    private $registrationForm;



    function __construct(RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;
    }


    /**
	 * Display a listing of the resource.
	 * GET /registration
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /registration/create
	 *
	 * @return Response
	 */
	public function create()
	{
        if (Auth::check()) return Redirect::home();

		return View::make('registration.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /registration
	 *
	 * @return Response
	 */
	public function store()
	{
        // get input
        $input = Input::only('email', 'password', 'password_confirmation');

        // validate registration credentials or throw
        $this->registrationForm->validate($input);

        // store the new user
        $user = User::create($input);

        // login and return to home page
        Auth::login($user);

        return Redirect::home();
	}

	/**
	 * Display the specified resource.
	 * GET /registration/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /registration/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /registration/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /registration/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}