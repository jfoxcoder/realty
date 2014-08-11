var LocationsCrudManager = (function () {





    function RegionItem(region, $regionEl, selectionChangedHandler) {

        this.region = region;

        this.$el = $regionEl;

        this.isSelected = function () {
            return this.$el.hasClass('location-selected');
        };

        this.select = function () {
            // deselect other
            this.$el.siblings('.location-selected')
                    .removeClass('location-selected');

            // select this
            this.$el.addClass('location-selected');
        };

        this.$el.click($.proxy(function(event) {

            this.select();

            selectionChangedHandler(this, event);

        }, this));

        this.render = function () {
            this.$el.text(this.region.name);
        };
    }



    function TownItem(town, $townEl, selectionChangedHandler) {

        this.town = town ;

        this.$el = $townEl;

        this.isSelected = function () {
            return this.$el.hasClass('location-selected');
        };

        this.$el.click($.proxy(function(event) {
            $townList.find('.location-selected').removeClass('location-selected');

            this.selected = ! this.selected;
            this.$el.toggleClass('location-selected');
            selectionChangedHandler(this, event);
        }, this));

        this.render = function () {
            this.$el.text(this.town.name);
        };
    }



    function SuburbItem(suburb, $suburbEl, selectionChangedHandler) {

        this.suburb = suburb ;

        this.$el = $suburbEl;


        this.isSelected = function () {
            return this.$el.hasClass('location-selected');
        };

        this.$el.click($.proxy(function(event) {
            $suburbList.find('.location-selected').removeClass('location-selected');

            this.selected = ! this.selected;
            this.$el.toggleClass('location-selected');
            selectionChangedHandler(this, event);
        }, this));

        this.render = function () {
            this.$el.text(this.suburb.name);
        };
    }















    // State ---------------------------------------------------

    // these arrays contain objects that represent a location and jquery element.
    var regionItems, townItems, suburbItems;

    // lists
    var $regionList, $townList, $suburbList;

    // buttons
    var $createRegionBtn, $editRegionBtn, $deleteRegionBtn,
        $createTownBtn, $editTownBtn, $deleteTownBtn,
        $createSuburbBtn, $editSuburbBtn, $deleteSuburbBtn;


    // headers
    var $townHeader, $suburbHeader;






    // Private Methods -----------------------------------------



    var initData = function (opts) {

        // set the REST urls
        LocationsDb.init({
            endpoints : opts.endpoints
        });

        // request location data
        LocationsDb.load(onLoaded, onLoadFail);
    };


    var setUi = function(ui) {
        // lists
        $regionList = ui.$regionList;
        $townList = ui.$townList;
        $suburbList = ui.$suburbList;

        // headers
        $townHeader = ui.$townHeader;
        $suburbHeader = ui.$suburbHeader;

        $createRegionBtn = ui.$createRegionBtn;
        $deleteRegionBtn = ui.$deleteRegionBtn;
        $editRegionBtn = ui.$editRegionBtn;

        $createTownBtn = ui.$createTownBtn;
        $deleteTownBtn = ui.$deleteTownBtn;
        $editTownBtn = ui.$editTownBtn;

        $createSuburbBtn = ui.$createSuburbBtn;
        $deleteSuburbBtn = ui.$deleteSuburbBtn;
        $editSuburbBtn = ui.$editSuburbBtn;
    };

    var setupEvents = function() {

        /* dynamic handlers for modal save/confirm buttons */
        var $body = $('body');
        $body.on('click', '#create-region-save-btn', onCreateRegionSave);
        $body.on('click', '#edit-region-save-btn', onEditRegionSave);
        $body.on('click', '#delete-region-confirm-btn', onDeleteRegionConfirm);
        $body.on('click', '#create-town-save-btn', onCreateTownSave);
        $body.on('click', '#edit-town-save-btn', onEditTownSave);
        $body.on('click', '#delete-town-confirm-btn', onDeleteTownConfirm);
        $body.on('click', '#create-suburb-save-btn', onCreateSuburbSave);
        $body.on('click', '#edit-suburb-save-btn', onEditSuburbSave);
        $body.on('click', '#delete-suburb-confirm-btn', onDeleteSuburbConfirm);

        $createRegionBtn.on('click', function () {
            LocationsElementFactory.openCreateRegionModal();
        });

        $editRegionBtn.on('click', function () {
            LocationsElementFactory.openEditRegionModal(selectedRegionItem().region);
        });

        $deleteRegionBtn.on('click', function () {
            LocationsElementFactory.openDeleteRegionModal(selectedRegionItem().region);
        });




        $createTownBtn.on('click', function () {
            if (selectedRegionItem()) {
                LocationsElementFactory.openCreateTownModal();
            } else {
                News.warn('Create Town', 'Please select a region.');
            }
        });

        $editTownBtn.on('click', function () {
            if (! selectedRegionItem()) {
                News.warn('Edit Town', 'Please select a region');
                return;
            }

            var ti = selectedTownItem();

            if (! ti) {
                News.warn('Edit Town', 'Please select a town');
                return;
            }

            LocationsElementFactory.openEditTownModal(ti.town);
        });



        $deleteTownBtn.on('click', function () {
            var townItem = selectedTownItem();

            if (townItem) {
                LocationsElementFactory.openDeleteTownModal(townItem.town);
            } else {
                News.warn('Delete Town', 'Please select a town');
            }
        });




        $createSuburbBtn.on('click', function () {
            if (selectedTownItem()) {
                LocationsElementFactory.openCreateSuburbModal();
            } else {
                News.warn('Create Suburb', 'Please select a region and town.');
            }
        });

        $editSuburbBtn.on('click', function () {
            if (selectedTownItem()) {
                LocationsElementFactory.openEditSuburbModal(selectedSuburbItem().suburb);
            } else {
                News.warn('Edit Suburb', 'Please select a region and town.');
            }

        });

        $deleteSuburbBtn.on('click', function () {
            var suburbItem = selectedSuburbItem();

            if (suburbItem) {
                LocationsElementFactory.openDeleteSuburbModal(suburbItem.suburb);
            } else {
                News.warn('Delete Suburb', 'Please select a suburb');
            }


        });
    };






    // MISC DOM Manipulation -----------------------------------

    var enableBtns = function () {
        for(var i = 0 ; i < arguments.length; i++) {
            arguments[i].removeClass('icon-btn-disabled');
        }
    };

    var disableBtns = function () {
        for(var i = 0 ; i < arguments.length; i++) {
            arguments[i].addClass('icon-btn-disabled');
        }
    };



    ////////// CRUD


    var selectedRegionItem = function () {
        return _.find(regionItems, function(ri) {
            return ri.isSelected();
        });
    };

    var selectedTownItem = function () {
        return _.find(townItems, function(ti) {
            return ti.isSelected();
        });
    };

    var selectedSuburbItem = function () {
        return _.find(suburbItems, function(si) {
            return si.isSelected();
        });
    };


    var buildAndInjectLocationItems = function (opts) {

        var i = 0, len = opts.locations.length;

        // clear locationItems
        opts.locationItems = [];

        // build location items
        for(; i < len; i++) {
            opts.locationItems.push(
                opts.createLocation(opts.locations[i])
            );
        }

        // inject location items
        opts.$locationsList.html(_.map(opts.locationItems, function (locationItem) {
            return locationItem.$el;
        }));

        return opts.locationItems;
    };

    // Event handlers ------------------------------------------



    var onRegionSelectedChanged = function (regionItem, event) {

        $townHeader.html('Districts, Cities & Towns');
        $suburbHeader.html('Suburbs');

        if (regionItem && regionItem.region.towns) {

            townItems = buildAndInjectLocationItems({
                locations : regionItem.region.towns,

                createLocation : function(town) {
                    return new TownItem(
                        town,
                        LocationsElementFactory.createTownElement(town),
                        onTownSelectedChanged
                    )
                },
                $locationsList : $townList
            });


            $suburbList.html('');
            $townHeader.html(regionItem.region.name + ' Districts, Cities & Towns');
            enableBtns($deleteRegionBtn, $editRegionBtn);
        } else {
            $townList.html('');
            $suburbList.html('');

            disableBtns($deleteRegionBtn, $editRegionBtn);
        }
    };


    var onTownSelectedChanged = function (townItem) {

        if (townItem) {
            $suburbHeader.html(townItem.town.name + ' Suburbs');

            enableBtns($deleteTownBtn, $editTownBtn);

            suburbItems = buildAndInjectLocationItems({
                locations : townItem.town.suburbs,

                createLocation : function(suburb) {
                    return new SuburbItem(
                        suburb,
                        LocationsElementFactory.createSuburbElement(suburb),
                        onSuburbSelectedChanged
                    );
                },
                $locationsList : $suburbList
            });
        } else {
            $suburbList.html('');
            $townHeader.html('Districts, Cities & Towns');
            $suburbHeader.html('Suburbs');
            disableBtns($deleteTownBtn, $editTownBtn);
        }


    };

    var onSuburbSelectedChanged = function (suburbItem) {
        if (suburbItem) {
            enableBtns($deleteSuburbBtn, $editSuburbBtn);    
        } else {
            disableBtns($deleteSuburbBtn, $editSuburbBtn);
        }
    };





    // Event handlers DATABASE ---------------------------------

    var onLoaded = function(regions) {

        regionItems = buildAndInjectLocationItems({
            locationItems : regionItems,
            locations : regions,

            createLocation : function(region) {

                return new RegionItem(
                    region,
                    LocationsElementFactory.createRegionElement(region),
                    onRegionSelectedChanged
                );
            },
            $locationsList : $regionList
        });

    };





    /* INITITATING DATABASE ***************************/


    var onCreateRegionSave = function () {
        LocationsDb.createRegion(
            $('#create-region').val(),
            onRegionCreated,
            onCreateRegionFail
        );
    };

    var onEditRegionSave = function () {
        LocationsDb.updateRegion(
            { id: selectedRegionItem().region.id,
              name: $('#edit-region').val()},
            onUpdateRegion,
            onUpdateRegionFail
        );

    };

    var onDeleteRegionConfirm = function () {

        LocationsDb.deleteRegion(
            selectedRegionItem().region,
            onRegionDeleted,
            onDeleteRegionFail
        );
    };







    var onCreateTownSave = function () {
        var regionItem = selectedRegionItem();

        if (regionItem) {
            LocationsDb.createTown(
                selectedRegionItem().region.id,
                $('#create-town').val(),
                onTownCreated,
                onCreateTownFail
            );
        } else {
            alert('please select a region first.');
        }
    };

    var onEditTownSave = function () {
        LocationsDb.updateTown(
            { id: selectedTownItem().town.id,
                name: $('#edit-town').val()},
            onUpdateTown,
            onUpdateTownFail
        );

    };

    var onDeleteTownConfirm = function () {
        LocationsDb.deleteTown(
            selectedTownItem().town,
            onTownDeleted,
            onDeleteTownFail
        );
    };









    var onCreateSuburbSave = function () {
        LocationsDb.createSuburb(
            selectedTownItem().town.id,
            $('#create-suburb').val(),
            onSuburbCreated,
            onCreateSuburbFail
        );
    };

    var onEditSuburbSave = function () {

        LocationsDb.updateSuburb(
            { id: selectedSuburbItem().suburb.id,
              name: $('#edit-suburb').val()},
            onUpdateSuburb,
            onUpdateSuburbFail
        );

    };

    var onDeleteSuburbConfirm = function () {

        LocationsDb.deleteSuburb(
            selectedSuburbItem().suburb,
            onSuburbDeleted,
            onDeleteSuburbFail
        );
    };


    /* INITITATING DATABASE ***************************/

























    /* POST DATABASE ACTIONS **************************/

    var onRegionCreated = function(region) {
        News.created('Region', region.name);

        closeModal('#create-region-modal');
        var regionItem = new RegionItem(
            region,
            LocationsElementFactory.createRegionElement(region),
            onRegionSelectedChanged
        );
        regionItems.push(regionItem);
        $regionList.prepend(regionItem.$el);
    };       
    var onUpdateRegion = function (updatedRegion) {
        News.updated('Region', updatedRegion.name);
        var regionItem = findRegionItem(updatedRegion.id);
        regionItem.region = updatedRegion;
        regionItem.render();
        closeModal('#edit-region-modal');
    };    
    var onRegionDeleted = function (deletedRegion) {
        News.deleted('Region', deletedRegion.name);

        var regionItem = findRegionItem(deletedRegion.id);
        regionItem.$el.fadeOut();
        closeModal('#delete-region-modal');
        onRegionSelectedChanged();
    };


    var onTownCreated = function(town) {
        console.log('created town', town);

        News.created('Town', town.name);

        closeModal('#create-town-modal');
        var townItem = new TownItem(
            town,
            LocationsElementFactory.createTownElement(town),
            onTownSelectedChanged
        );
        townItems.push(townItem);


        // add town to its region

        var regionItem = findRegionItem(town.region_id);

        regionItem.region.towns.push(town);

        $townList.prepend(townItem.$el);
    };

    var onUpdateTown = function (updatedTown) {
        News.updated('Town', updatedTown.name);
        var townItem = findTownItem(updatedTown.id);
        townItem.town = updatedTown;
        townItem.render();
        closeModal('#edit-town-modal');
    };
    var onTownDeleted = function (deletedTown) {
        News.deleted('Town', deletedTown.name);

        var townItem = findTownItem(deletedTown.id);
        var regionItem = findRegionItem(townItem.town.region_id);

        // remove the town from the region
        regionItem.region.towns = _.without(regionItem.region.towns, townItem.town);

        // remove the townitem from the townItems
        townItems = _.without(townItems, townItem);

        // remove the townitem from the view
        townItem.$el.fadeOut();

        closeModal('#delete-town-modal');
        onTownSelectedChanged();
    };






    var onSuburbCreated = function(suburb) {
        console.log('created suburb', suburb);

        News.created('Suburb', suburb.name);

        closeModal('#create-suburb-modal');

        var suburbItem = new SuburbItem(
            suburb,
            LocationsElementFactory.createSuburbElement(suburb),
            onSuburbSelectedChanged
        );
        suburbItems.push(suburbItem);
        $suburbList.prepend(suburbItem.$el);

        // add suburb to its town
        var townItem = findTownItem(suburb.town_id);
        townItem.town.suburbs.push(suburb);
    };


    var onUpdateSuburb = function (updatedSuburb) {
        News.updated('Suburb', updatedSuburb.name);
        var suburbItem = findSuburbItem(updatedSuburb.id);
        suburbItem.suburb = updatedSuburb;
        suburbItem.render();
        closeModal('#edit-suburb-modal');
    };
    

    var onSuburbDeleted = function (deletedSuburb) {
        News.deleted('Suburb', deletedSuburb.name);

        var suburbItem = findSuburbItem(deletedSuburb.id);
        var townItem = findTownItem(suburbItem.suburb.town_id);

        // remove the suburb from the town
        townItem.town.suburbs = _.without(townItem.town.suburbs, suburbItem.suburb);

        // remove the suburbitem from the suburbItems
        suburbItems = _.without(suburbItems, suburbItem);

        // remove the suburbitem from the view
        suburbItem.$el.fadeOut();

        closeModal('#delete-suburb-modal');
        onSuburbSelectedChanged();
    };

   
    /* POST DATABASE ACTIONS **************************/











    /* ERROR HANDLING ***************************************/

    var onCreateRegionFail = function (message) {
        News.createError('Region', message);
    };

    var onUpdateRegionFail = function (message) {
        News.updateError('Region', message);
    };

    var onDeleteRegionFail = function (message) {
        News.deleteError('Region', message);
    };

    var onCreateTownFail = function (message) {
        News.createError('Town', message);
    };

    var onUpdateTownFail = function (message) {
        News.updateError('Town', message);
    };

    var onDeleteTownFail = function (message) {
        News.deleteError('Town', message);
    };

    var onCreateSuburbFail = function (message) {
        News.createError('Suburb', message);
    };

    var onUpdateSuburbFail = function (message) {
        News.updateError('Suburb', message);
    };

    var onDeleteSuburbFail = function (message) {
        News.deleteError('Suburb', message);
    };

    var onLoadFail = function(jqXHR, textStatus, errorThrown) {
        alert('Error loading location data: ' + textStatus);
    };

    var onFail = function(jqXHR, textStatus, errorThrown) {
        alert('Location Error: ' + textStatus);
    };

    /* ERROR HANDLING ***************************************/













    /* MISC *****************************************************/

    var closeModal = function (sel) {
        $(sel).foundation('reveal', 'close').remove();
    };

    var findRegionItem = function (id) {
        return _.find(regionItems, function(ri) {
            return ri.region.id == id;
        });
    };

    var findTownItem = function (id) {
        return _.find(townItems, function(ti) {
            return ti.town.id == id;
        });
    };

    var findSuburbItem = function (id) {
        return _.find(suburbItems, function(si) {
            return si.suburb.id == id;
        });
    };

    /* MISC *****************************************************/















    // Interface -----------------------------------------------

    return {
        init : function (opts) {

            // compile templates
            LocationsElementFactory.init(opts.templateHtml);

            // set the jquery fields
            setUi(opts.ui);

            // wire-up the events
            setupEvents();

            initData(opts);
        }
    }

})();