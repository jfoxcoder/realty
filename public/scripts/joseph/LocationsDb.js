var LocationsDb = (function () {

    // REST urls
    var endpoints = {};

    var init = function (opts) {
        endpoints.load = opts.endpoints.index;
        endpoints.region = opts.endpoints.region;
        endpoints.town = opts.endpoints.town;
        endpoints.suburb = opts.endpoints.suburb;
    };

    var load = function (onLoad, onLoadFail) {
        $.getJSON(endpoints.load, function (response) {
            if (response.ok) {
                onLoad(response.data);
            } else {
                onLoadFail(response.message)
            }
        })
        .fail(onLoadFail);
    };



    var createRegion = function(name, onRegionCreated, onCreateRegionFail) {
        $.ajax({
            url : endpoints.region,
            type : 'post',
            data : { name : name }
        })
            .done(function (region) {

                onRegionCreated(region);
            })
            .fail(function(jqXHR) {
                failWithError(jqXHR, onCreateRegionFail);
            });
    };

    var updateRegion = function (region, onUpdateRegion, onUpdateRegionFail) {

        $.ajax({
            url : endpoints.region + '/' + region.id,
            type : 'put',
            data : region
        })
            .done(function (data) {
                onUpdateRegion(data.region);
            })
            .fail(function(jqXHR) {
                failWithError(jqXHR, onUpdateRegionFail);
            });
    };

    var deleteRegion = function (region, onRegionDeleted, onDeleteRegionFail) {
        $.ajax({
            url : endpoints.region + '/' + region.id,
            type : 'delete',
            data : region.id
        })
        .done(function () {
            onRegionDeleted(region);
        })
        .fail(function(jqXHR) {
            failWithError(jqXHR, onDeleteRegionFail);
        });
    };










    var createTown = function(regionId, name, onTownCreated, onCreateTownFail) {

        $.ajax({
            url : endpoints.town,
            type : 'post',
            data : { region_id: regionId, name : name }
        })
        .done(function (town) {
            onTownCreated(town);
        })
        .fail(function(jqXHR) {
            failWithError(jqXHR, onCreateTownFail);
        });
    };

    var deleteTown = function (town, onTownDeleted, onDeleteTownFail) {
        $.ajax({
            url : endpoints.town + '/' + town.id,
            type : 'delete',
            data : town.id
        })
            .done(function () {
                onTownDeleted(town);
            })
            .fail(function(jqXHR) {
                failWithError(jqXHR, onDeleteTownFail);
            });
    };






    var updateTown = function (town, onUpdateTown, onUpdateTownFail) {

        $.ajax({
            url : endpoints.town + '/' + town.id,
            type : 'put',
            data : town
        })
        .done(function (data) {
            onUpdateTown(data.town);
        })
        .fail(function(jqXHR) {
            failWithError(jqXHR, onUpdateTownFail);
        });
    };

    var createSuburb = function(townId, name, onSuburbCreated, onCreateSuburbFail) {

        $.ajax({
            url : endpoints.suburb,
            type : 'post',
            data : { town_id: townId, name : name }
        })
        .done(function (suburb) {
            onSuburbCreated(suburb);
        })
        .fail(function(jqXHR) {
            failWithError(jqXHR, onCreateSuburbFail);
        });
    };

    var deleteSuburb = function (suburb, onSuburbDeleted, onDeleteSuburbFail) {
        $.ajax({
            url : endpoints.suburb + '/' + suburb.id,
            type : 'delete',
            data : suburb.id
        })
        .done(function () {
            onSuburbDeleted(suburb);
        })
        .fail(function(jqXHR) {
            failWithError(jqXHR, onDeleteSuburbFail);
        });
    };

   

    var updateSuburb = function (suburb, onUpdateSuburb, onUpdateSuburbFail) {

        $.ajax({
            url : endpoints.suburb + '/' + suburb.id,
            type : 'put',
            data : suburb
        })
        .done(function (data) {
            onUpdateSuburb(data.suburb);
        })
        .fail(function(jqXHR) {
            failWithError(jqXHR, onUpdateSuburbFail);
        });
    };
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    var failWithError = function(jqXHR, callback) {
        console.log('LocationDb.js Ajax Fail', jqXHR.responseJSON);

        if (jqXHR.status >= 500) {
            callback("Problem on the server. Please try again later.");
        } else {
            callback(jqXHR.responseJSON.errors[0]);
        }
    };











    return {
        init : init,
        load : load,
        createRegion : createRegion,
        updateRegion : updateRegion,
        deleteRegion : deleteRegion,

        createTown : createTown,
        updateTown : updateTown,
        deleteTown : deleteTown,

        createSuburb : createSuburb,
        updateSuburb : updateSuburb,
        deleteSuburb : deleteSuburb
    }

})();
