@extends('layouts.admin')
@section('title', 'Manage Property Listings')

@section('content')

<header class="row">
    <h1>Manage Listings</h1>
</header>

<div class="row">
    <div class="pagination-centered">
        {{ $listings->appends(Request::except('page'))->links() }}
    </div>

    <div class="left">
        @include('partials.sort', ['route' => 'admin.listings.index', 'sorter' => $sorter])
    </div>
        <div class="right">
        {{ link_to_route('admin.listings.create', 'Create Listing', null, [ 'class' => 'tiny success button']) }}
    </div>
</div>

<div class="row">
    <table class="large-12 large-centered columns">
        <thead>
            <tr>
                <th style="width: 150px">Listing Title</th>
                <th>Price</th>
                <th>Area</th>
                <th>Facilities</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listings as $l)
                <tr data-listing="{{ $l->id }}">

                    <td>{{ $l->title }}</td>

                    <td>$&nbsp;{{ $l->getFormattedPrice() }}</td>

                    <td><strong>{{ $l->land }} m<sup>2</sup></strong> land<br/>
                        <strong>{{ $l->floor }} m<sup>2</sup></strong> floor</td>

                    <td><strong>{{ $l->beds }}</strong> bedrooms<br/>
                        <strong>{{ $l->baths }}</strong> bathrooms<br/>
                        <strong>{{ $l->cars }}</strong> car spaces</td>

                    <td>{{ $l->getStreetAddress() }}<br/>
                        {{ $l->suburb->name }}<br/>
                        {{ $l->suburb->town->name }}<br/>
                        {{ $l->suburb->town->region->name }}</td>

                    <td>
                        {{ link_to_route('admin.listings.edit',
                                         'Edit', ['id' => $l->id],
                                         ['class' => 'button tiny']) }}

                        {{ link_to_route('admin.photos.edit',
                                         'Images',
                                         ['id' => $l->id],
                                         ['class' => 'button tiny']) }}

                        <button class="tiny alert button delete-listing-btn">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
@stop

@section('scripts')
    {{ HTML::script('scripts/joseph/ListingsManager.js') }}
    {{ HTML::script('scripts/joseph/listings.js') }}
@stop