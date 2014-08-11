<?php namespace admin;


use Illuminate\Support\Facades\View;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;

class LocationsController extends \BaseController {



    public function index()
    {
        JavaScript::put([
            'locationsCrud' => [

                // let the script know where the region,
                // town and suburb resources are.

                'endpoints' => [
                    'index' => route('locations.index'),
                    'region' => route('admin.regions.index'),
                    'town' => route('admin.towns.index'),
                    'suburb' => route('admin.suburbs.index')
                ]
            ]
        ]);

        return View::make('admin.locations.index');
    }
}