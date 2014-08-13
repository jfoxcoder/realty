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
    if (Realty.location.mode !== 'create') {
        opts.values = Realty.location.values;
    }
    LocationManager.init(opts);
});
