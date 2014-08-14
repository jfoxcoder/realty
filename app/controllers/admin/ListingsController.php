<?php namespace admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use joseph\forms\UpdateListingsForm;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use View;
use Listing;

class ListingsController extends \BaseController {

    protected $listingsForm;

    function __construct(UpdateListingsForm $listingsForm)
    {
        $this->listingsForm = $listingsForm;
    }


    /**
	 * Display a listing of the resource.
	 * GET /listings
	 *
	 * @return Response
	 */
	public function index()
	{
        $listings = Listing::sort()->paginate(0);

        JavaScript::put([
            'listings' => [
                'deleteUrl' => route('admin.listings.store')
            ]
        ]);

        return View::make('admin.listings.index', [
            'listings' => $listings,
            'sorter' => Listing::getSorter()
        ]);
	}






	/**
	 * Store a newly created resource in storage.
	 * POST /listings
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();

        // associate the listing with the logged-in admin
        $input['created_by'] = Auth::id();

        // Workaround for mismatch between the form and model suburb field names
        $input['suburb_id'] = $input['suburb'];

        // exit via exception on validation error
        $this->listingsForm->validate($input);

        Listing::create($input);

        return Redirect::back()->withInput()->with('Save OK');
	}



	/**
	 * Show the form for editing the specified resource.
	 * GET admin/listings/{listing}/edit
	 *
	 * @param  Listing  $listing
	 * @return Response
	 */
	public function edit(Listing $listing)
	{
        $this->injectEditCreateJavascriptVars($listing);

        return View::make('admin.listings.edit', compact('listing'));
	}



    /**
     * Show the form for creating a new resource.
     * GET /listings/create
     *
     * @return Response
     */
    public function create()
    {
        JavaScript::put([
            'location' => [
                'url' => route('locations.index')
            ]
        ]);

        return View::make('admin.listings.create');
    }


	public function update($listing)
	{

        // todo: mass assignment

        $input = Input::all();

        // exit via exception on validation error
        $this->listingsForm->validate($input);

        $listing->title = $input['title'];
        $listing->price = $input['price'];
        $listing->description = $input['description'];

        $listing->land = $input['land'];
        $listing->floor = $input['floor'];
        $listing->beds = $input['beds'];
        $listing->baths = $input['baths'];
        $listing->cars = $input['cars'];

        $listing->street_number = $input['street_number'];
        $listing->street_name = $input['street_name'];

        $listing->suburb_id = $input['suburb'];

        $listing->save();


        return Redirect::back()->withInput()->with('Save OK');
	}


	public function destroy(Listing $listing)
	{
        $listing->delete();
	}


    public function injectEditCreateJavascriptVars(Listing $listing, $mode="edit")
    {
        // photos

        // common variables

        $vars = [
            'listing' => [
                'deleteUrl' => route('admin.listings.destroy', ['id' => $listing->id]),
                'mode' => $mode
            ]
        ];

        // locations

        $location = [
            'url' => route('locations.index'), // todo: check this
            'mode' => $mode
        ];

        // add suburb, town and region ids if in edit mode

        if ($mode === 'edit') {
            $location['values'] = [
                'regionId' => $listing->suburb->town->region->id,
                'townId' => $listing->suburb->town->id,
                'suburbId' => $listing->suburb->id
            ];
        }


        // add the location data and inject

        $vars['location'] = $location;

        JavaScript::put($vars);
    }

}