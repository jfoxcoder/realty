<?php

class Region extends RealtyEloquent {
	protected $fillable = ['name', 'island'];
    protected $hidden = ['created_at', 'updated_at'];

    public static $rules = ['name' => 'required|unique:regions'];


    public function towns()
    {
        return $this->hasMany('Town');
    }

    public function suburbs()
    {
        return $this->hasManyThrough('Suburb', 'Town');
    }



    public function findListings()
    {

        // return all the listings for this region.
        // towns -> suburbs -> listings


        //Log::info('suburbs', ['context' => $suburbs]);


        // input will be a region id

        // listing->suburb->town->region



        //listings with suburbs that belong to this regions towns.









//        $listings = DB::table('listings')
//                      ->join('suburbs', 'suburbs.id', '=', 'listings.suburb_id')
//                      ->join('towns', 'towns.id', '=', 'suburbs.town_id')
//                      ->join('regions', 'regions.id', '=', 'towns.region_id')
//                      ->where('region_id', '=', $this->id)
//                      ->select();
//                      ->get();
//
//        return $listings;

        //return $this->hasManyThrough('Listing', 'Town');




    }


    public function countListings()
    {
        $result = DB::select(self::COUNT_LISTINGS_SQL, [$this->id]);

        // access the count through the alias (result is probably a PDO class of some sort).
        return $result[0]->listingCount;
    }


######## RAW QUERIES ########

const COUNT_LISTINGS_SQL = <<<'EOD'
select count(*) as 'listingCount' from listings
    INNER JOIN suburbs on listings.suburb_id = suburbs.id
    INNER JOIN towns on suburbs.town_id = towns.id
    INNER JOIN regions on towns.region_id = regions.id
    where regions.id = ?
EOD;

}