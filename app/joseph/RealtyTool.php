<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 20/06/14
 * Time: 6:01 PM
 */

namespace joseph;


class RealtyTool {

    public static function generateListingSlug(Listing $listing)
    {
        $suburb = Suburb::find($listing->suburb_id);

        return $listing->street_number.'-'.$listing->street_name.'-'.$suburb->name;
    }
} 