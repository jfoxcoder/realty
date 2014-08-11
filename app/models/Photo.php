<?php

class Photo extends \Eloquent {

	protected $fillable = ['filename', 'listing_id', 'order'];


    /**
     * @return mixed
     */
    public function listing()
    {
        return $this->belongsTo('Listing');
    }


    /**
     * @return string the url to the photo
     */
    public function path()
    {
        return asset('/images/listings/'.$this->listing_id.'/'.$this->filename);
    }

    /**
     * @return string
     */
    public function filepath()
    {
        return public_path('/images/listings/'.$this->listing_id.'/'.$this->filename);
    }





}