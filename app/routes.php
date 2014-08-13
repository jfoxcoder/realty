<?php
//dd(Config::get('database.connections.mysql'));
//dd(App::environment());

function debugUploads()
{
    // test create directory
    $dir = '~/default/public/images/listings/testdir';

    $result = File::makeDirectory($dir);

    if ($result)
        dd('makeDirectory returned true');
    else
        dd('makeDirectory returned false');
}

debugUploads();




/**
 * Model Binding
 */
Route::model('listings', 'Listing');




/**
 * Admin Login
 */
Route::group(['prefix' => 'admin','namespace' => 'admin'], function() {

    Route::get('login', [
        'namespace' => 'admin',
        'as' => 'admin.login',
        'uses' => 'AdminSessionsController@create'
    ]);
    Route::post('sessions', [
        'as' => 'admin.sessions.store',
        'uses' => 'AdminSessionsController@store'
    ]);
});

/**
 * Admin with Authorisation.
 */
Route::group(['before' => 'adminAuth', 'prefix' => 'admin', 'namespace' => 'admin'], function() {


        Route::get('logout', [
            'as' => 'admin.logout',
            'uses' => 'AdminSessionsController@destroy'
        ]);

        //Route::get('/', 'AdminController@index');

        Route::get('/', [
            'as' => 'admin.home',
            'uses' => 'AdminController@index'
        ]);

        Route::resource('listings', 'ListingsController');

        Route::get('/listings/{listingId}/photos', [
            'as' => 'admin.listings.photos.index',
            'uses' => 'PhotosController@index'
        ]);

        Route::resource('contacts', 'ContactsController', ['only' => ['index', 'destroy']]);

        Route::resource('photos', 'PhotosController');

        Route::get('locations',  [ 'as' => 'admin.locations.index', 'uses' => 'LocationsController@index']);

        Route::resource('regions', 'RegionsController', ['only' => ['index', 'update', 'store', 'destroy']]);
        Route::resource('towns', 'TownsController', ['only' => ['index', 'update', 'store', 'destroy']]);
        Route::resource('suburbs', 'SuburbsController', ['only' => ['index', 'update', 'store', 'destroy']]);
});








/**
 * User with Authorisation.
 */
Route::group(['before' => 'auth'], function ()
{

    Route::post('wishes', [
        'as' => 'wishes.store',
        'uses' => 'WishesController@store'
    ]);

    Route::delete('wishes/{listingId}', [
        'as' => 'wishes.destroy',
        'uses' => 'WishesController@destroy'
    ]);

    Route::get('wishlist', [
        'as' => 'wishlist',
        'uses' => 'WishesController@index'
    ]);

});























# Home
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

Route::resource('listings', 'ListingsController', ['only' => 'show']);


# About
Route::get('/about', ['as' => 'about', 'uses' => 'PagesController@about']);

# Contacts
Route::get('/contact', ['as' => 'contact', 'uses' => 'ContactsController@create']);
//Route::get('/contacts/store', ['as' => 'contacts.store', 'uses' => 'ContactsController@store']);
Route::resource('contacts', 'ContactsController', ['only' => ['create', 'store']]);

# Registration
Route::get('/register', ['as' => 'register', 'uses' => 'RegistrationController@create']);
Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);

# User Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);



Route::resource('locations', 'LocationsController', ['only' => 'index']);


