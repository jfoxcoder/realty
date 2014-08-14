// configure location selects for creating a listing
$(function () {

    LocationManager.init({
        locationsUrl : Realty.location.url,
        $region : $('#region'),
        $town : $('#town'),
        $suburb : $('#suburb'),
        mode : 'create'
    });

});
