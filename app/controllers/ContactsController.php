<?php

use joseph\forms\ContactForm;

class ContactsController extends \BaseController {

    private $contactForm;

    function __construct(ContactForm $contactForm)
    {
        $this->contactForm = $contactForm;
    }


    /**
	 * Display a listing of the resource.
	 * GET /contacts
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the Contacts form
	 * GET /contacts/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('contacts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /contacts
	 *
	 * @return Response
	 */
    public function store()
    {
        // get input
        $input = Input::only('name', 'email', 'phone', 'message');

        // validate registration credentials or throw
        $this->contactForm->validate($input);

        // store the new contact
        Contact::create($input);

        return Redirect::home();
    }

	/**
	 * Display the specified resource.
	 * GET /contacts/{id}
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
	 * GET /contacts/{id}/edit
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
	 * PUT /contacts/{id}
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
	 * DELETE /contacts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}