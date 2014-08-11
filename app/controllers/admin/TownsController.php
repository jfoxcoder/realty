<?php namespace admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Region;
use Town;

class TownsController extends \BaseController {

    use JsonResponder;


    public function index()
    {

    }

	/**
	 * Store a newly created resource in storage.
	 * POST /towns
	 *
	 * @return Response
	 */
	public function store()
	{
        // get the region that this town belongs to
        $regionId = Input::get('region_id');
        $region = Region::findOrFail($regionId);





        Log::info('store town', ['context' => ['regionId' => $regionId]]);

        if (Town::isValid($data = Input::all()))
        {
            $town = Town::create($data);
            $town->suburbs = [];

            return JsonResponse::create($town);
        }

       return $this->makeJsonValidationErrorResponse(Town::$errors);
    }



	/**
	 * Update the specified resource in storage.
	 * PUT /towns/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        if (Town::isValid(Input::all()))
        {
            // find the town model
            $town = Town::find($id);

            // get the new name
            $name = Input::get('name');

            // update the town
            $town->name = $name;

            // persist
            $town->save();

            // return the updated town
            return JsonResponse::create(['town' => $town]);
        }
        else
        {
            return $this->makeJsonValidationErrorResponse(Town::$errors);
        }
	}





	/**
	 * Remove the specified resource from storage.
	 * DELETE /towns/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$town = Town::findOrFail($id);


        // prevent deletion if there are listings
        // under this town.
        $listingCount = $town->countListings();
        if ($listingCount > 0) {

            return $this->makeJsonValidationErrorResponse('Cannot delete '
                .$town->name.' because it has '.$listingCount.' property listings.');
        }

        // prevent deletion if there are suburbs
        // under this town
        $suburbCount = $town->suburbs()->count();
        if ($suburbCount > 0) {
            return $this->makeJsonValidationErrorResponse('Cannot delete '
                .$town->name.' because it has '.$suburbCount.' suburbs.');
        }

        // delete
        $town->delete();

        return JsonResponse::create(['region_id' => $town->region_id, 'id' => $id, 'name' => $town->name]);
	}





}