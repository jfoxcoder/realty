<?php


use Illuminate\Support\Facades\Log;

class ListingsController extends \BaseController {

	/**
	 * Display the specified resource.
	 * GET /listings/{id}
	 *
	 * @param  Listing  $listing
	 * @return Response
	 */
	public function show(Listing $listing)
	{

        return View::make('listings.show', compact('listing'));
	}
}