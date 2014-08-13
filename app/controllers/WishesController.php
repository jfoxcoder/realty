<?php

class WishesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /wishes
	 *
	 * @return Response
	 */
	public function index()
	{
        $listings = Auth::user()->wishes;

        return View::make('wishes.index', compact('listings'));
	}



	/**
	 * Store a newly created resource in storage.
	 * POST /wishes
	 *
	 * @return Response
	 */
	public function store()
	{
        $listingId = Input::get('listingId');

        // todo validate listing id

        Auth::user()->wishes()
                    ->attach($listingId);
	}




	/**
	 * Remove the specified resource from storage.
	 * DELETE /wishes/{listingId}
	 *
	 * @param  int  $listingId
	 * @return Response
	 */
	public function destroy($listingId)
	{
		Auth::user()->wishes()->detach($listingId);

        return Response::json(['ok' => true], 200);
	}

}