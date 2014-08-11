<?php namespace joseph\presenters;

use McCool\LaravelAutoPresenter\BasePresenter;

class ListingPresenter extends BasePresenter {



    function __construct(\Listing $listing)
    {

        $this->resource = $listing;
    }

    public function price()
    {
        return '$'. number_format($this->resource->price);
    }

    public function address()
    {

        return $this->resource->street_number.' '.$this->resource->street_name.' '.$this->resource->suburb->name;
    }


}