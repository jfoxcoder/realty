$(function () {

    // regions, towns and suburbs

    // todo: configure for home page filtering

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
