@extends('layouts.admin')
@section('title', 'Edit Property Images')
@section('content')

<!-- Gallery -->
<div id="gallery-panel" class="panel-row row">
    <h3 class="left"><a href="{{ URL::route('admin.listings.edit', [ 'id' => $listing->id]) }}" style="text-decoration: underline;" title="Edit this listing">{{ $listing->getStreetAddress() }}</a></h3>

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
        <li>Loading images...</li>
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
    {{ HTML::script('scripts/joseph/PhotoManager.js') }}
    {{ HTML::script('scripts/joseph/photos.js') }}
@stop