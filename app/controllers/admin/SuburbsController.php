<?php namespace admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Region;
use Suburb;
use Town;

class SuburbsController extends \BaseController {

    use JsonResponder;

    public function index()
    {
    }

	/**
	 * Store a newly created resource in storage.
	 * POST /suburbs
	 *
	 * @return Response
	 */
	public function store()
	{
        // get the town that this suburb belongs to
        $townId = Input::get('town_id');



        $town = Town::findOrFail($townId);


        if (Suburb::isValid($data = Input::all()))
        {
            $suburb = Suburb::create($data);

            // associate suburb with its town todo: research ORM way
            $suburb->town_id = $town->id;

            return JsonResponse::create($suburb);
        }

       return $this->makeJsonValidationErrorResponse(Suburb::$errors);
    }



	/**
	 * Update the specified resource in storage.
	 * PUT /suburbs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        if (Suburb::isValid(Input::all()))
        {
            // find the suburb model
            $suburb = Suburb::find($id);

            // get the new name
            $name = Input::get('name');

            // update the suburb
            $suburb->name = $name;

            // persist
            $suburb->save();

            // return the updated suburb
            return JsonResponse::create(['suburb' => $suburb]);
        }
        else
        {
            return $this->makeJsonValidationErrorResponse(Suburb::$errors);
        }
	}





	/**
	 * Remove the specified resource from storage.
	 * DELETE /suburbs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$suburb = Suburb::findOrFail($id);

        // prevent deletion if there are listings
        // under this suburb.
        $listingCount = $suburb->listings()->count();
        if ($listingCount > 0) {

            return $this->makeJsonValidationErrorResponse('Cannot delete '
                .$suburb->name.' because it has '.$listingCount.' property listings.');
        }

        // delete
        $suburb->delete();

        return JsonResponse::create([
            'town_id' => $suburb->town_id,
            'id' => $id,
            'name' => $suburb->name
        ]);
	}





}