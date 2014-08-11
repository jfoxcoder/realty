<?php

class Town extends \RealtyEloquent {
	protected $fillable = ['name', 'region_id'];
    protected $hidden = ['created_at', 'updated_at'];


    public static $rules = ['name' => 'required'];

    public function region()
    {
        return $this->belongsTo('Region');
    }

    public function suburbs()
    {
        return $this->hasMany('Suburb');
    }


    public function countListings()
    {
        $result = DB::select(self::COUNT_LISTINGS_SQL, [$this->id]);

        return $result[0]->listingCount;
    }

    public function listings()
    {
        return $this->hasManyThrough('Listing', 'Suburb');
    }


######## RAW QUERIES ########

    const COUNT_LISTINGS_SQL = <<<'EOD'
select count(*) as 'listingCount' from listings
INNER JOIN suburbs on listings.suburb_id = suburbs.id
INNER JOIN towns on suburbs.town_id = towns.id
where towns.id = ?
EOD;
}