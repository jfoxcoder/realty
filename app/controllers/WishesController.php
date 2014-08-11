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
	 * Show the form for creating a new resource.
	 * GET /wishes/create
	 *
	 * @return Response
	 */
	public function create()
	{
        Log::info('WishesController@create hit');

        return "wishes.create";
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

        Auth::user()->wishes()
                    ->attach($listingId);
	}



	/**
	 * Display the specified resource.
	 * GET /wishes/{id}
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
	 * GET /wishes/{id}/edit
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
	 * PUT /wishes/{id}
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
	 * DELETE /wishes/{listingId}
	 *
	 * @param  int  $listingId
	 * @return Response
	 */
	public function destroy($listingId)
	{
        Log::info('destroy wish '.$listingId);
		Auth::user()->wishes()->detach($listingId);

        return Response::json(['ok' => true], 200);
	}

}