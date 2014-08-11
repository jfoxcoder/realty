<?php



class Listing extends RealtyEloquent {

	protected $fillable = ['title', 'description', 'price', 'created_by'];


    /***
     * @return User The admin who created this Listing.
     */
    public function creater()
    {
        return $this->belongsTo('User', 'user_id', 'created_by');
    }



    /***
     * @return Suburb The suburb that this listing is in.
     */
    public function suburb()
    {
        return $this->belongsTo('Suburb');
    }


    public function getFormattedPrice()
    {
        return number_format ( $this->price, 0);
    }



    public function getFormattedCreatedAt()
    {
        return $this->created_at->format('j M, Y');
    }

    public function getDiffCreatedAt()
    {
        return $this->created_at->diffForHumans();
    }



    public function photos()
    {
        return $this->hasMany('Photo');
    }




    /***
     * @var array The fields that can be sorted on and their ascending and descending labels.
     */
    protected static $sortable = [
        ['title', 'Title', 'Title Z-A'],
        ['price', 'Lowest Price', 'Highest Price'],
        ['created_at', 'Older Listings', 'Recent Listings'],
        ['beds', null, 'Most Bedroms'],
        ['baths', null, 'Most Bathrooms'],
        ['cars', null, 'Most Car Spaces'],
        ['land', null, 'Biggest Section size'],
        ['floor', null, 'Most Floor Space']
    ];



    public function getPhotosDirectory()
    {
        return public_path()."\\images\\listings\\".$this->id;
    }



    public function getLeadPhotoUrl()
    {
        $leadPhoto = Photo::where('listing_id', $this->id)
                          ->orderby('order')
                          ->first();



        if ($leadPhoto) {

            return $leadPhoto->path();
        } else {
            Log::info('Accessed null lead photo');
            return '#';
        }



    }



}


