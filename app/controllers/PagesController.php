<?php

class PagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /pages
	 *
	 * @return Response
	 */
	public function index()
	{
        // todo: result heading based on search, e.g., "Showing Dallington listings".
        //       (set a field in findListings)

        $listings = $this->findListings();





        JavaScript::put([
            "location" => [
                'url' => route('locations.index'),
                'mode' => 'filter',
                'values' => [
                    'suburbId' => intval(Input::get('suburb')),
                    'townId' => intval(Input::get('town')),
                    'regionId' => intval(Input::get('region'))
                ]
            ]
        ]);

		return View::make('pages.index', compact('listings'));
	}

    public function about()
    {

        return View::make('pages.about');
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /pages/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pages
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /pages/{id}
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
	 * GET /pages/{id}/edit
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
	 * PUT /pages/{id}
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
	 * DELETE /pages/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


    private function addWishlistJsVarsIfLoggedIn()
    {
        if (Auth::check()) {
            JavaScript::put([
                "wishlist" => [
                    'postUrl' => route('wishes.store')
                ]
            ]);
        }
    }

    /**
     * Used to set the region, town and suburb <select>s to.
     * on the search results page
     *
     * @return array
     */
    private function getInputLocationIds()
    {

        dd(intval(Input::get('asdfasdfasdfasdf')));

        // nothing                  ?region=0&town=0
        // Auckland                 ?region=1&town=0&suburb=0
        // Auckland/Rodney          ?region=1&town=49&suburb=0
        // Auckland/Rodney/Leigh    ?region=1&town=49&suburb=686
        $values = [];

        $suburbId = intval(Input::get('suburb'));
        $townId = intval(Input::get('town'));
        $regionId = intval(Input::get('region'));
        
        if ($suburbId) $values['suburbId'] = $suburbId;
        if ($townId) $values['townId'] = $townId;
        if ($regionId) $values['regionId'] = $regionId;

        return $values;
    }


    /**
     * Returns the listings according to the location inputs.
     *
     * If any suburb, town or region is invalid, aborts with a 404.
     *
     * If no location parameters are provided, returns all listings.
     *
     * @return mixed
     */
    private function findListings()
    {

        // listings by suburb

        $suburbId = Input::get('suburb');

        if ($suburbId) {
            $suburb = Suburb::find($suburbId);
            
            if ($suburb) {
                return $suburb->listings;
            } else {
                App::abort(404, "That suburb does not exist.");
            }
        }

        // listings by town

        $townId = Input::get('town');

        if ($townId) {
            $town = Town::find($townId);

            if ($town) {
                //http://realty.dev/?region=3&town=9&suburb=0
                Log::info('returning listings from '.$town->name);
                return $town->listings;
            } else {
                App::abort(404, "That town does not exist.");
            }
        }

        // listings by region

        $regionId = Input::get('region');

        if ($regionId)  {
            if ($region = Region::find($regionId)) {
                $suburbIds = $region->suburbs->lists('id');
                return Listing::whereIn('suburb_id', $suburbIds)->get();
            } else {
                App::abort(404, "That region does not exist.");
            }
        }

        // no location parameters provided - return all listings

        return Listing::all();
    }

}