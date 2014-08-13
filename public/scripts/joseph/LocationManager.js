/**
 * Created by Joseph on 21/06/14.
 */
var LocationManager = (function(){
    // The region, town and suburbs (via ajax).
    var locations = {};

    // The current region, town and suburb ids
    var values;

    // edit|create
    var mode;

    // The select elements
    var $region, $town, $suburb;

    var selectedRegion, selectedTown, selectedSuburb;

    // Template to build <option> elements for region, town and suburb drop-downs.
    var optionTemplate =
        _.template('<option value="<%= id %>"><%= name %></option>');

    var disabledOptionTemplate =
        _.template('<option disabled><%= name %></option>');

    // Template to build <optgroup> elements to group each region by Nth/sth island etc.
    var optgroupTemplate =
        _.template('<optgroup label="<%= island %>"><%= optionsHtml %></optgroup>');


    var OPT_DEF_REGION = '<option value="0">All Regions</option>';
    var OPT_DEF_TOWN = '<option value="0">All Towns</option>';
    var OPT_DEF_SUBURB = '<option value="0">All Suburbs</option>';
    var OPT_LOADING = '<option>Loading...</option>';





    var load = function (url) {

        $region.html(OPT_LOADING);
        $town.html(OPT_LOADING);
        $suburb.html(OPT_LOADING);

        $.getJSON(url, function (response) {
            if (response.ok) {
                if (mode === 'filter') {
                    $town.html(OPT_DEF_TOWN);
                    $suburb.html(OPT_DEF_SUBURB);
                }
                loadOk(response.data)



            } else {
                loadError(response.message);
            }
        })
        .fail(loadError);
    }


    var loadOk = function (data) {
        locations = data;

        populateRegions();

        console.log('loadOk values=', values, 'now selecting ');

        selectOption($region, values.regionId);
        selectOption($town, values.townId);
        selectOption($suburb, values.suburbId);
    }



    var selectOption = function($select, value) {


        console.log('setting ', $select, 'to value', value);

        // select the option
        $('option[value=' + value + ']', $select).prop('selected', true);

        // trigger town/suburb injections so they can be selected
        $select.change();
    }


    var populateRegions = function () {
        var regionsHtml, regionHtml, islandHtml;

        // Group the regions by island.
        var islands = _.groupBy(locations, function(region) {
            return region.island;
        })

        // Create the markup for $region.

        regionsHtml = OPT_DEF_REGION;

        _.forEach(islands, function(island) {
            regionHtml = '';

            // Build the region/options for this island.
            _.forEach(island, function (region) {
                regionHtml += region.enabled ? optionTemplate(region) : disabledOptionTemplate(region);
            })

            // Create the island optgroup and inject the regions.
            islandHtml = optgroupTemplate({
                island : island[0].island, // grab the island name from the first region
                optionsHtml : regionHtml
            });

            // Append the optgroup for this island.
            regionsHtml += islandHtml;
        });

        // Inject the optgroups and options into the dropdown.
        $region.html(regionsHtml);
    }

    var loadError = function(message) {
        alert(message);
    }

    var readSelectedRegion = function () {
        console.log('reading selected region');
        var regionId = parseInt($region.val(), 0);

        selectedRegion = null;

        if (regionId > 0) {
            selectedRegion = _.findWhere(locations, {id: regionId});
            return true;
        }
        return false;
    }

    var readSelectedTown = function () {
        console.log('reading selected town');
        var townId = parseInt($town.val(), 0);

        selectedTown = null;

        if (townId > 0 ) {
            // todo: test whether selectedRegion can be null here
            selectedTown = _.findWhere(selectedRegion.towns, {id: townId});
            return true;
        }

        return false;
    }



    var onRegion = function () {

        console.log('onRegion');

        if (readSelectedRegion()) {
            var townsHtml = OPT_DEF_TOWN;
            townsHtml += _.map(selectedRegion.towns, function (town) {

                return town.enabled ? optionTemplate(town) : disabledOptionTemplate(town);
            });
        }

        setOptionsHtml($town, townsHtml, selectedRegion !== null);
    }



    var onTown = function () {

        console.log('onTown');

        if (readSelectedTown()) {
            var suburbsHtml = OPT_DEF_SUBURB;

            suburbsHtml += _.map(selectedTown.suburbs, function (suburb) {
                return suburb.enabled ? optionTemplate(suburb) : disabledOptionTemplate(suburb);
            });
        }
        setOptionsHtml($suburb, suburbsHtml, selectedTown !== null);
    }

    var setOptionsHtml = function ($select, html, enabled) {
        if (enabled) {
            $select.html(html);
            $suburb.prop('disabled', false);
        } else {
            $select.html(optionTemplate({ id: 0, name: ''}));
            $suburb.prop('disabled', true);
        }
    }


    var onSuburb= function () {

    }




    return {
        init : function (opts) {

            console.log('LocationManager received', opts);

            mode = opts.mode;

            $region = opts.$region;
            $town = opts.$town;
            $suburb = opts.$suburb;

            $region.on('change', onRegion);
            $town.on('change', onTown);
            $suburb.on('change', onSuburb);

            values = opts.values || {};

            load(opts.locationsUrl);
        }
    }
})();
