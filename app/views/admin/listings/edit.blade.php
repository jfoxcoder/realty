@extends('layouts.admin')
@section('title', 'Edit Property Listings')

@section('content')



<div id="#form-panel" class="panel-row row">

    <h2 class="left">Listing Details</h2>

    {{ Form::model($listing, [
        'route' => ['admin.listings.update', $listing->id],
        'method' => 'put',
        'novalidate' => 'novalidate'
    ]) }}


    <div class="toolbar right">
        {{ link_to_route('admin.listings.index', 'Cancel', null, [
                'id' => 'cancel-btn',
                'class' => 'tiny alert button',
                'title' => 'Discard changes and go back to listings page'
        ]) }}

        {{ Form::submit('Save', [
            'id' => 'submitButton',
            'class' => 'tiny success button',
            'title' => 'Save Changes.'
        ]) }}
    </div>


    <!-- Title -->
    <div class="row">
        <div class="small-8 medium-9 columns">
            {{ Form::label('title') }}
            {{ Form::text('title', null, ['required' => 'required']) }}
            @if ($errors->first('title'))
            <small class="error">{{ $errors->first('title') }}</small>
            @endif
        </div>
        <div class="small-4 medium-3 columns">
            {{ Html::unit_label('price', 'Price', 'New Zealand Dollars', 'NZD') }}
            {{ Form::input('number', 'price', null, ['min' => '0', 'max' => '100000000']) }}

            @if ($errors->first('price'))
            <small class="error">{{ $errors->first('price') }}</small>
            @endif
        </div>
    </div>



    <div class="row">
        <div class="medium-6 columns">
            {{ Form::label('description') }}
            {{ Form::textarea('description', null, ['required' => 'required', 'rows' => '18']) }}
            @if ($errors->first('description'))
            <small class="error">{{ $errors->first('description') }}</small>
            @endif
        </div>

        <div class="medium-6 columns">


            <fieldset class="small-12 medium-12 columns">
                <legend>Land and Floor Area</legend>
                <div class="small-4 medium-6 columns">
                    {{ Html::unit_label('land', 'Land', 'Metres Squared', 'm²') }}
                    {{ Form::input('number', 'land', null, ['min' => '0', 'max' => '10000']) }}
                    @if ($errors->first('land'))
                    <small class="error">{{ $errors->first('land') }}</small>
                    @endif
                </div>
                <div class="small-4 medium-6 end columns">
                    {{ Html::unit_label('floor', 'Floor', 'Metres Squared', 'm²') }}
                    {{ Form::input('number', 'floor', null, ['min' => '0', 'max' => '10000']) }}
                    @if ($errors->first('floor'))
                    <small class="error">{{ $errors->first('floor') }}</small>
                    @endif
                </div>
            </fieldset>
            <fieldset class="medium-12 columns">
                <legend>Facilities</legend>
                <div class="small-4 medium-4 columns">
                    {{ Form::label('baths', 'Bathrooms') }}
                    {{ Form::input('number', 'baths', null, ['min' => '0', 'max' => '1000']) }}
                    @if ($errors->first('baths'))
                    <small class="error">{{ $errors->first('baths') }}</small>
                    @endif
                </div>
                <div class="small-4 medium-4 columns">
                    {{ Form::label('beds', "Bedrooms") }}
                    {{ Form::input('number', 'beds', null, ['min' => '0', 'max' => '100']) }}
                    @if ($errors->first('beds'))
                    <small class="error">{{ $errors->first('beds') }}</small>
                    @endif
                </div>
                <div class="small-4 medium-4 end columns">
                    {{ Form::label('cars') }}
                    {{ Form::input('number', 'cars', null, ['min' => '0', 'max' => '1000']) }}
                    @if ($errors->first('cars'))
                    <small class="error">{{ $errors->first('cars') }}</small>
                    @endif
                </div>
            </fieldset>

        </div>
    </div>



    <div class="row">
        <fieldset class="medium-10 medium-offset-1">
            <legend>Location</legend>

            <div class="row">
                <div class="medium-4 columns">
                    {{ Form::label('region') }}
                    {{ Form::select('region', [], ['disabled' => 'disabled']) }}
                </div>

                <div class="medium-4 columns">
                    {{ Form::label('town', 'City') }}
                    {{ Form::select('town', [], ['disabled' => 'disabled']) }}
                </div>
                <div class="medium-4 columns">
                    {{ Form::label('suburb') }}
                    {{ Form::select('suburb', [], ['disabled' => 'disabled']) }}
                    @if ($errors->first('suburb'))
                    <small class="error">{{ $errors->first('suburb') }}</small>
                    @endif
                </div>
            </div>

            <!-- Title -->
            <div class="row">
                <div class="small-3 medium-2 columns">
                    {{ Form::label('street_number') }}
                    {{ Form::text('street_number', null, ['required' => 'required']) }}
                    @if ($errors->first('street_number'))
                    <small class="error">{{ $errors->first('street_number') }}</small>
                    @endif
                </div>
                <div class="small-9 medium-10 columns">
                    {{ Form::label('street_name') }}
                    {{ Form::text('street_name', null, ['required' => 'required']) }}
                    @if ($errors->first('street_name'))
                    <small class="error">{{ $errors->first('street_name') }}</small>
                    @endif
                </div>
            </div>

        </fieldset>
    </div>
    {{ Form::close() }}




</div>




<!-- Gallery -->
<div id="gallery-panel" class="panel-row row">
    <h2 class="left">Listing Photos</h2>

    <div class="toolbar right">
        {{ Form::button('Uploader', [
            'id' => 'open-upload-modal-button',
            'class' => 'tiny success button',
            'title' => 'Open upload dialog to add photos to listing.'
        ]) }}

        {{ Form::button('Clear Selection', [
            'id' => 'clear-button',
            'class' => 'tiny button inactive-button',
            'title' => 'Deselect all selected photos'
        ]) }}

        {{ Form::button('Delete Photo', [
            'id' => 'delete-button',
            'class' => 'tiny alert button inactive-button',
            'title' => 'Delete the selected image files. Cannot be undone.',
            'data-reveal-id' => 'confirm-delete-modal'
        ]) }}

    </div><!-- toolbar -->

    <ul id="photo-list"
        class="small-block-grid-2 medium-block-grid-4 large-block-grid-5 columns">
    </ul>
</div>



















{{-- Modals --}}

<div id="upload-modal" class="reveal-modal tiny" data-reveal>
    <h3>Upload Photos</h3>

    {{ Form::open(['route' => 'admin.photos.store', 'id' => 'photo-form','files' => true]) }}

    {{ Form::hidden('listingId', $listing->id) }}

    {{ Form::file('photos', ['id' => 'fileInput', 'class' => 'left',  'style' => 'padding: 10px;', 'multiple' => 'multiple']) }}


    {{-- {{ Form::reset('Clear', ['id' => 'resetUploadButton', 'class' => 'tiny primary button']) }} --}}

    {{ Form::submit('Upload Photos', [
        'id' => 'upload-button',
        'class' => 'tiny success button right', 'style' => 'margin-left: 10px;',
        'title' => 'Upload the chosen photos to the server.'
    ]) }}
    {{ Form::close() }}

    <a class="close-reveal-modal">&#215;</a>
</div>



<div id="confirm-delete-modal" class="reveal-modal tiny" data-reveal>
    <h3>Confirm Photo Delete</h3>

    {{ Form::button('Yes, delete the selected photo(s).', ['id' => 'confirm-delete-button', 'class' => 'small alert button right', 'style' => 'margin-left: 10px;']) }}

    <a class="close-reveal-modal">&#215;</a>
</div>
@stop

@section('scripts')
    {{ HTML::script('scripts/joseph/EditListingManager.js') }}
    {{ HTML::script('scripts/joseph/edit-listing.js') }}
    {{ HTML::script('scripts/joseph/LocationManager.js') }}
    {{ HTML::script('scripts/joseph/location-edit.js') }}
    {{ HTML::script('scripts/joseph/PhotoManager.js') }}
    {{ HTML::script('scripts/joseph/photos.js') }}
@stop