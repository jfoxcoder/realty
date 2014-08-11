@extends('layouts.admin')
@section('title', 'Manage Locations')
@section('content')

<div class="row">
    <h1>Manage Locations</h1>
</div>

<div class="row location-section">
    <div class="row location-header-row" >

        <div class="small-10 columns">
            <h3 id="region-header">New Zealand Regions</h3>
        </div>

        <div class=" small-2 columns">
            <div class="location-toolbar ">
            <span id="create-region-btn" class="icon-plus icon-btn" title="Create Region"></span>
            <span id="delete-region-btn" class="icon-minus icon-btn icon-btn-disabled" title="Delete Region"></span>
            <span id="edit-region-btn" class="icon-pencil2 icon-btn icon-btn-disabled" title="Edit Region"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <ul id="region-list" class="location-crud-list"></ul>
    </div>
</div>





<div class="row location-section">
    <div class="row location-header-row" >

        <div class="small-10 columns">
            <h3 id="town-header">Districts, Cities & Towns</h3>
        </div>

        <div class=" small-2 columns">
            <div class="location-toolbar ">
                <span id="create-town-btn" class="icon-plus icon-btn" title="Create District, City or Town"></span>
                <span id="delete-town-btn" class="icon-minus icon-btn icon-btn-disabled" title="Delete District, City or Town"></span>
                <span id="edit-town-btn" class="icon-pencil2 icon-btn icon-btn-disabled" title="Edit District, City or Town"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <ul id="town-list" class="location-crud-list"></ul>
    </div>
</div>





















<div class="row location-section">
    <div class="row location-header-row" >

        <div class="small-10 columns">
            <h3 id="suburb-header">Suburbs</h3>
        </div>

        <div class=" small-2 columns">
            <div class="location-toolbar ">
                <span id="create-suburb-btn" class="icon-plus icon-btn" title="Create Suburb"></span>
                <span id="delete-suburb-btn" class="icon-minus icon-btn icon-btn-disabled" title="Delete Suburb"></span>
                <span id="edit-suburb-btn" class="icon-pencil2 icon-btn icon-btn-disabled" title="Edit Suburb"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <ul id="suburb-list" class="location-crud-list"></ul>
    </div>
</div>





@include('admin.locations.templates')

@stop



@section('scripts')
{{ HTML::script('scripts/vendor/handlebars-v1.3.0.js') }}
{{ HTML::script('scripts/joseph/LocationsDb.js') }}
{{ HTML::script('scripts/joseph/LocationsElementFactory.js') }}
{{ HTML::script('scripts/joseph/LocationsCrudManager.js') }}
{{ HTML::script('scripts/joseph/locations-crud.js') }}
@stop