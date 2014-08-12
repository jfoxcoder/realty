<?php namespace admin;



use Contact;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;

class ContactsController extends \BaseController {


    /**
	 * Display a listing of the resource.
	 * GET /contacts
	 *
	 * @return Response
	 */
	public function index()
	{

        // todo: paginate, sort etc.

        $contacts = Contact::all();

        // pass rest endpoints to the client
        JavaScript::put([
           'contacts' => [
               'deleteUrl' => Url::route('admin.contacts.index')
            ]
        ]);

        return View::make('admin.contacts.index', compact('contacts'));
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
		$contact = Contact::findOrFail($id);

        $contact->delete();

        return Response::json(['ok' => true], 200);
	}
}