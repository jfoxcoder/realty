<?php namespace joseph\composers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;

class ListingComposer {

    public function compose($view)
    {
        if (Auth::check()) {

            $wishes = DB::table('wishes')->whereUserId(Auth::user()->id)
                                         ->lists('listing_id');

            $view->with('wishes', $wishes);

            JavaScript::put([
                "wishlist" => [
                    'postUrl' => route('wishes.store'),
                    'homeUrl' => route('home'),
                    'isWishlistPage' => Route::currentRouteName() === 'wishlist'
                ]
            ]);
        }
    }

}