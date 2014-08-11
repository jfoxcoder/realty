$(function () {

    LocationsCrudManager.init({

        endpoints : Realty.locationsCrud.endpoints,

        ui : {
            $regionList : $('#region-list'),
            $townList : $('#town-list'),
            $suburbList : $('#suburb-list'),

            $townHeader : $('#town-header'),
            $suburbHeader : $('#suburb-header'),

            $createRegionBtn : $('#create-region-btn'),
            $deleteRegionBtn : $('#delete-region-btn'),
            $editRegionBtn : $('#edit-region-btn'),

            $createTownBtn : $('#create-town-btn'),
            $deleteTownBtn : $('#delete-town-btn'),
            $editTownBtn : $('#edit-town-btn'),

            $createSuburbBtn : $('#create-suburb-btn'),
            $deleteSuburbBtn : $('#delete-suburb-btn'),
            $editSuburbBtn : $('#edit-suburb-btn')
        },

        templateHtml : {
            createRegionModal : $('#create-region-modal-template').html(),
            editRegionModal : $('#edit-region-modal-template').html(),
            deleteRegionModal : $('#delete-region-modal-template').html(),

            createTownModal : $('#create-town-modal-template').html(),
            editTownModal : $('#edit-town-modal-template').html(),
            deleteTownModal : $('#delete-town-modal-template').html(),

            createSuburbModal : $('#create-suburb-modal-template').html(),
            editSuburbModal : $('#edit-suburb-modal-template').html(),
            deleteSuburbModal : $('#delete-suburb-modal-template').html()
        }


    });

});