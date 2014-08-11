/*  builds the region, town and suburb tags */

var LocationsElementFactory = (function () {

    // the underscore templates
    var templates = {};



    // private methods


    // public methods

    var init = function (templateHtml) {

        // compile the underscore templates

        templates.editRegionModal = _.template(templateHtml.editRegionModal);
        templates.createRegionModal = _.template(templateHtml.createRegionModal);
        templates.deleteRegionModal = _.template(templateHtml.deleteRegionModal);

        templates.editTownModal = _.template(templateHtml.editTownModal);
        templates.createTownModal = _.template(templateHtml.createTownModal);
        templates.deleteTownModal = _.template(templateHtml.deleteTownModal);

        templates.editSuburbModal = _.template(templateHtml.editSuburbModal);
        templates.createSuburbModal = _.template(templateHtml.createSuburbModal);
        templates.deleteSuburbModal = _.template(templateHtml.deleteSuburbModal);




        templates.region = buildTagTemplate('region');
        templates.town = buildTagTemplate('town');
        templates.suburb = buildTagTemplate('suburb');
    };



    var buildTagTemplate = function (locationType) {



        var locationTemplateHtml = '<li data-region="<%= id %>" class="location-tag location-tag-'
            + locationType + '"><%= name %></li>';

        return _.template(locationTemplateHtml);
    };


    var createRegionElement = function (region) {
        var regionHtml = templates.region(region);
        var $regionEl = $(regionHtml);
        return $regionEl;
    };

    var createTownElement = function (town) {
        return $(templates.town(town));
    };

    var createSuburbElement = function (suburb) {
        return $(templates.suburb(suburb));
    };


    var openCreateRegionModal = function (region) {
        return openModal(region, templates.createRegionModal);
    };

    var openEditRegionModal = function (region) {
        return openModal(region, templates.editRegionModal);
    };

    var openDeleteRegionModal = function (region) {
        return openModal(region, templates.deleteRegionModal);
    };



    var openCreateTownModal = function (town) {
        return openModal(town, templates.createTownModal);
    };

    var openEditTownModal = function (town) {
        return openModal(town, templates.editTownModal);
    };

    var openDeleteTownModal = function (town) {
        return openModal(town, templates.deleteTownModal);
    };

    var openCreateSuburbModal = function (suburb) {
        return openModal(suburb, templates.createSuburbModal);
    };

    var openEditSuburbModal = function (suburb) {
        return openModal(suburb, templates.editSuburbModal);
    };

    var openDeleteSuburbModal = function (suburb) {
        return openModal(suburb, templates.deleteSuburbModal);
    };
    
    
    
    
    

    var openModal = function (model, template) {
        var modalHtml = template(model);
        var $modal = $(modalHtml);
        $modal.foundation('reveal', 'open');
        $modal.find('form').submit(function (e) {
            e.preventDefault();
        });
        return $modal;
    };




    // interface

    return {
        init : init,

        createRegionElement : createRegionElement,
        createTownElement : createTownElement,
        createSuburbElement : createSuburbElement,

        openEditRegionModal : openEditRegionModal,
        openCreateRegionModal : openCreateRegionModal,
        openDeleteRegionModal : openDeleteRegionModal,

        openEditTownModal : openEditTownModal,
        openCreateTownModal : openCreateTownModal,
        openDeleteTownModal : openDeleteTownModal,

        openEditSuburbModal : openEditSuburbModal,
        openCreateSuburbModal : openCreateSuburbModal,
        openDeleteSuburbModal : openDeleteSuburbModal
    };

})();