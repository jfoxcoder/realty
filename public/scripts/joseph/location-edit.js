/**
 * Created by Joseph on 21/06/14.
 */

$(function () {

    var opts = {
        locationsUrl : Realty.location.url,
        $region : $('#region'),
        $town : $('#town'),
        $suburb : $('#suburb'),
        mode : Realty.location.mode
    }

    // add listing location ids if in edit mode
    if (Realty.location.mode === 'edit') {
        opts.values = Realty.location.values;


    } else if (Realty.location.mode === 'create') {


    }

    LocationManager.init(opts);

});
