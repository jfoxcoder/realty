$(function () {

    LocationManager.init({
        locationsUrl : Realty.location.url,
        $region : $('#region'),
        $town : $('#town'),
        $suburb : $('#suburb'),
        mode : 'edit',
        values : Realty.location.values
    });

});
