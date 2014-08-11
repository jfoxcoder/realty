<?php

class LocationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /locations
	 *
	 * @return Response
	 */
	public function index()
	{
        if (Request::ajax())
        {
            $regions = Region::with('towns.suburbs')->get();

            //$this->applyEnabled2();
            $this->applyEnabled($regions);


            return Response::json([
                'data' => $regions,
                'ok' => true,
                'message' => 'ok'

            ]);
        }
	}

    private function applyEnabled($regions)
    {
        // todo: optimise this clunkiness.

        foreach($regions as $region)
        {
            foreach($region->towns as $town)
            {
                foreach($town->suburbs as $suburb)
                {
                    if (Listing::where('suburb_id', $suburb->id)->count() > 0)
                    {
                        $suburb->enabled = true;
                        $town->enabled = true;
                        $region->enabled = true;
                    }
                }
            }
        }
    }

    private function applyEnabled2() {
        // suburbs with listings

        // select distinct suburbs.id from suburbs
        // inner join listings on listings.suburb_id = suburbs.id;

        $suburbsWithListings = Suburb::has('Listing');

        Log::info('subswithlists', ['context' => $suburbsWithListings]);

    }

    private function applyCounts($regions)
    {
        foreach($regions as $region)
        {
            $region->count = 0;

            foreach($region->towns as $town)
            {
                $town->count = 0;

                foreach($town->suburbs as $suburb)
                {
                    $suburb->count = Listing::where('suburb_id', $suburb->id)
                        ->count();
                    $town->count += $suburb->count;
                }
                $region->count += $town->count;
            }
        }
    }


    public function editor() {

    }



//	/**
//	 * Show the form for creating a new resource.
//	 * GET /locations/create
//	 *
//	 * @return Response
//	 */
//	public function create()
//	{
//		//
//	}
//
//	/**
//	 * Store a newly created resource in storage.
//	 * POST /locations
//	 *
//	 * @return Response
//	 */
//	public function store()
//	{
//		//
//	}

//	/**
//	 * Display the specified resource.
//	 * GET /locations/{id}
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function show($id)
//	{
//		//
//	}
//
//	/**
//	 * Show the form for editing the specified resource.
//	 * GET /locations/{id}/edit
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function edit($id)
//	{
//		//
//	}
//
//	/**
//	 * Update the specified resource in storage.
//	 * PUT /locations/{id}
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function update($id)
//	{
//		//
//	}
//
//	/**
//	 * Remove the specified resource from storage.
//	 * DELETE /locations/{id}
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function destroy($id)
//	{
//		//
//	}

}