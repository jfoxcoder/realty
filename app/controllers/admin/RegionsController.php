<?php namespace admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Region;



class RegionsController extends \BaseController {

    use JsonResponder;


    public function index()
    {

    }

	/**
	 * Store a newly created resource in storage.
	 * POST /regions
	 *
	 * @return Response
	 */
	public function store()
	{
        if (Region::isValid($data = Input::all()))
        {
            $region = Region::create($data);
            $region->island = "North Island";
            $region->towns = [];

            return JsonResponse::create($region);
        }

        return $this->makeJsonValidationErrorResponse(Region::$errors);
	}



	/**
	 * Update the specified resource in storage.
	 * PUT /regions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        if (Region::isValid(Input::all()))
        {
            // find the region model
            $region = Region::find($id);

            // get the new name
            $name = Input::get('name');

            // update the region
            $region->name = $name;

            // persist
            $region->save();

            // return the updated region
            return JsonResponse::create(['region' => $region]);
        }
        else
        {
            return $this->makeJsonValidationErrorResponse(Region::$errors);
        }
	}





	/**
	 * Remove the specified resource from storage.
	 * DELETE /regions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$region = Region::findOrFail($id);

        // prevent deletion if there are listings
        // under this region.
        $listingCount = $region->countListings();
        if ($listingCount > 0) {

            return $this->makeJsonValidationErrorResponse('Cannot delete '
                .$region->name.' because it has '.$listingCount.' property listings.');
        }

        // prevent deletion if there are towns
        // under this region
        $townCount = $region->towns()->count();
        if ($townCount > 0) {
            return $this->makeJsonValidationErrorResponse('Cannot delete '
                .$region->name.' because it has '.$townCount.' towns.');
        }

        // delete
        $region->delete();

        return JsonResponse::create(['id' => $id, 'name' => $region->name]);
	}





}